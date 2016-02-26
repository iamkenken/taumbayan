<?php

class CategoriesController extends BaseController{

	public function viewCategories()
	{
		if(Auth::check()){
		$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.categories')->with('profile', $profile)->with('user',$user);
		}else{
		return View::make('pages.categories');
		}
	}
	
	public function viewCategory($id)
	{
		if(Auth::check()){
			$user = User::with('profile')->find(Auth::user()->id); //Show authenticated user own profile details.
			$profile = $user->profile;
			return View::make('pages.category')
				->with('cat',Category::find($id))
				->with('categories',Category::orderby('Name', 'asc')->get())->with('profile', $profile)->with('user',$user);
		}else{
			return View::make('pages.category')
				->with('cat',Category::find($id))
				->with('categories',Category::orderby('Name', 'asc')->get());
		}
					
	}
		

}
