<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Placement;
use App\Models\PlacementPromo;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;


class PublisherController extends Controller
{
    public function dashboard(){

      $chartData = $this->generateDummyChartData();

      $chart = (new LarapexChart)
        ->areaChart()
        ->addData('Physical sales', array_values($chartData))
        ->addData('Digital sales', array_values($chartData))

      //  ->addLine('Order', array_values($chartData))
        ->setXAxis(array_keys($chartData))
        ->setTitle('TEST')
        ->setSparkline()
        ->toVue();

        unset($chart['height']);


        //dd($chart);




        // Prepare the chart object
        // $chart = [
        //     'width' => 800,
        //     'height' => 400,
        //     'type' => 'line',
        //     'options' => [
                
        //     ],
        //     'series' => [
        //         [
        //             'name' => 'Dummy Series',
        //             'data' => $chartData,
        //         ]
        //     ]
        // ];

      // Return the chart data.
      return view('publisher.dashboard', ['chart' => $chart]);
    }

    public function generateDummyChartData($numDataPoints = 10){
      $seriesData = [];
      for ($i = 0; $i < $numDataPoints; $i++) {
          $value = rand(0, 100);
          $seriesData[] = $value;
      }
      return $seriesData;
    }

    public function placements(){
      return view('publisher.placement.view', 
       ['placements' => SpladeTable::for(Placement::where('user_id', Auth::id()))
        ->column('name', sortable: true, canBeHidden: false)
        ->column('api', canBeHidden: false)
        ->column('earned', canBeHidden: false)
        ->column('status', canBeHidden: true)
        ->column('created_at', canBeHidden: true)
        ->column('action' , canBeHidden: true)
        ->paginate(5)
      ]);
    }

    public function create(){
     $category = [
      ['id' => '1', 'name' => 'Web'],
      ['id' => '2', 'name' => 'Android'],
      ['id' => '3', 'name' => 'Ios'],
     ];
     
      return view('publisher.placement.create', ['category' => $category]);
    }

    public function add_placement(Request $req){

     $requestData = $req->validate([
      'name' => 'required|min:5|max:50',
      'category' => 'required',
      'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
      'currency' => 'required',
      'rate' => 'required|numeric',
      'postback' => 'required',
     ]);

     $requestData['user_id'] = Auth::user()->id;
     $requestData['api'] = Str::random(20);

     Placement::create($requestData);
 
      if($req->has('message') && $req->filled('message')){

        $requestPromo = $req->validate([
          'message' => 'required|min:10|max:250',
          'percentage' => 'required|max:100',
          'start_at' => 'required|date',
          'end_at' => 'required|date'
        ]);

        $requestPromo['user_id'] = Auth::user()->id;
        $requestPromo['placement_id'] = $placement->id;

        PlacementPromo::create($requestPromo);
      }

      Toast::message('Placement Successfully Created')->success()->rightBottom()->autoDismiss(3);
      return redirect()->route('placements');
    }

    public function edit($id){

      $placement = Placement::with('promo')->findOrFail($id);
      $promotions = PlacementPromo::where('user_id', $placement->user_id)->where('placement_id', $placement->id)->first();

      unset($placement->promo);

      $newplacement = $placement->toArray();

      if ($placement->promo->isNotEmpty()) {
        $promoArray = $placement->promo[0]->toArray();
        unset($promoArray['id'], $promoArray['user_id'], $promoArray['created_at'], $promoArray['updated_at']);
        $newplacement = array_merge($newplacement, $promoArray);
    }

      // if($placement->promo){
      //   unset($placement->promo);
      //   $placementArray = $placement->toArray();
      //   unset($placementArray['status']);

      //   $promoArray = $placement->promo->toArray();
      //   foreach($promoArray as $p){
      //    unset($p['id'], $p['user_id'], $p['created_at'], $p['updated_at']);
      //   }

        //$promo = $p;
        //
        // if(!empty($promo)){
        //   $newplacement = array_merge($placementArray, $promo);
        // } else {
        //   $newplacement = $placement;
        // }

        // if(empty($promo)){
        //   $newplacement = $placement;
        // } else {
        //   $newplacement = array_merge($placementArray, $promo);
        // }

        //$newplacement = isset($promo) ? array_merge($placementArray, $promo) : $placementArray;
      //}

      $category = [
       ['id' => '1', 'name' => 'Web'],
       ['id' => '2', 'name' => 'Android'],
       ['id' => '3', 'name' => 'Ios'],
      ];

     return view('publisher.placement.edit', ['placement' => $newplacement, 'promotions' => $promotions, 'category' => $category]);
    }

    public function update(Request $req, $id){
      $placement = Placement::with('promo')->findOrFail($id);

      $requestData = $req->validate([
        'name' => 'required|min:5|max:50',
        'category' => 'required',
        'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
        'currency' => 'required',
        'rate' => 'required|numeric',
        'postback' => 'required',
      ]);
  
      $requestData['user_id'] = Auth::user()->id;
      $requestData['api'] = Str::random(20);
  
      $placement->update($requestData);
   
      if($req->has('message') && $req->filled('message')){

        $promo = PlacementPromo::where('user_id', $placement->user_id)->where('placement_id', $placement->id)->first();

        $requestPromo = $req->validate([
          'message' => 'required|min:10|max:250',
          'percentage' => 'required|max:100',
          'start_at' => 'required|date',
          'end_at' => 'required|date'
        ]);
  
        $requestPromo['user_id'] = Auth::user()->id;
        $requestPromo['placement_id'] = $placement->id;
  
        if ($promo) {
          $promo->update($requestPromo); // Update existing promo
        } else {
          PlacementPromo::create($requestPromo); // Create new promo
        }
      }

      Toast::message('Placement Successfully Updated')->success()->rightBottom()->autoDismiss(3);
     return redirect()->route('placements');
    }

    public function promo_delete($id){
      $promo = PlacementPromo::where('placement_id', $id)->first();
      $promo->delete();

      Toast::message('Promotion Successfully Deleted')->success()->rightBottom()->autoDismiss(3);

      return back();
    }
}
