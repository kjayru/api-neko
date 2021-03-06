<?php 

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Manager;

trait ApiResponser
{
	private function successResponse($data, $code)
	{
		return response()->json($data,$code);
	}

	protected function errorResponse($message,$code)
	{
		return response()->json(['error'=>$message, 'code'=>$code],$code);
	}

	protected function showAll(Collection $collection, $code = 200)
	{
		if($collection->isEmpty()){
		     return $this->successResponse(['data' => $collection],$code);
		};
		$transformer = $collection->first()->transformer;
		$collection = $this->transformData($collection,$transformer);
		return $this->successResponse(['data'=>$collection],$code);
	}

	protected function showOne(Model $instance,  $code = 200)
	{
		$transformer = $instance->transformer;
		$instance = $this->transformData($instance,$transformer);
		return $this->successResponse(['data'=>$instance],$code);
	}

	protected function showMessage($message, $code = 200)
	{
		return $this->successResponse(['data' => $message],$code);
	}

	protected function sortData(Collection $collection)
	{
		if(request()->has('sort_by')){
			$attribute = request()->sort->by;
			$collection = $collection->sortBy($attribute);
		}
		return $collection;
	}

	protected function transformData($data, $transformer)
	{
		$transformation = fractal($data, new $transformer);
		return $transformation->toArray();
	}

	
}