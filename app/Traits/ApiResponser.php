<?php 

namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
trait ApiResponser
{
	private function successReponse($data, $code)
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
		}

		$transformer = $collection->first()->transformer;
		$collection = $this->transformData($collection,$transformer);
		return $this->successReponse($collection,$code);
	}

	protected function showOne(Model $model,  $code = 200)
	{
		$transformer = $instance->transformer;
		$instance = $this->transformData($instance,$transformer);
		return $this->successReponse($instance,$code);
	}

	protected function showMessage($message, $code = 200)
	{
		return $this->successReponse(['data' => $message],$code);
	}

	protected function transformData($data, $transformer)
	{
		$transformation = fractal($data, new $transformer);
		return $transformation->toArray();
	}
}