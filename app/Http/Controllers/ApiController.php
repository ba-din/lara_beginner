<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Use App\Widget;

// Use DB;\

use App\Queries\GridQueries\GridQuery;
use App\Queries\GridQueries\WidgetQuery;
use App\Queries\GridQueries\MarketingImageQuery;
use App\Http\Requests;

class ApiController extends Controller
{

    // Begin Subcategory Api Data Grid Method

    public function subcategoryData(Request $request)
    {

        return GridQuery::sendData($request, 'SubcategoryQuery');

    }

    // End Subcategory Api Data Grid Method



    // Begin Category Api Data Grid Method

    public function categoryData(Request $request)
    {

        return GridQuery::sendData($request, 'CategoryQuery');

    }

    // End Category Api Data Grid Method


    public function widgetData(Request $request)
	{
		//************* using Widget Model
	   // $rows = Widget::select('id as Id',
	   //                        'name as Name',
	   //                        'created_at as Created')
	   //                        ->paginate(10);

	   // return response()->json($rows);
		/************************/

		//**************************** using DB
		// $rows = DB::table('widgets	')
  		//               ->select('id as Id',
 		 //               'name as Name',
  		//                DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") as Created'))
  		//               ->paginate(10);

  		//       return response()->json($rows);
		/*******************************/


		return GridQuery::sendData($request, new WidgetQuery);
	}

	public function marketingImageData(Request $request)
	{
		return GridQuery::sendData($request, new MarketingImageQuery);
	}
}
