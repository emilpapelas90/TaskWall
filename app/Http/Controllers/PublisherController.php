<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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

    public function generateDummyChartData($numDataPoints = 10)
    {
        $seriesData = [];
        for ($i = 0; $i < $numDataPoints; $i++) {
            $value = rand(0, 100);
            $seriesData[] = $value;
        }
        return $seriesData;
    }

    public function placements(){
      return view('publisher.placement.view');
    }

    public function create(){
     $category = [
      ['id' => '1', 'name' => 'Web'],
      ['id' => '2', 'name' => 'Android'],
      ['id' => '3', 'name' => 'Ios'],
     ];

     
      return view('publisher.placement.create', ['category' => $category]);
    }

    public function edit(){
      return view('publisher.placement.edit');
    }
}
