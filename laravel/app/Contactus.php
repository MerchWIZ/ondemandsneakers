<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;


class Contactus extends Model {

	// use Authenticatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contactus';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['f_name', 'l_name', 'email', 'phone_number', 'message', 'status', 'deleted'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['_token'];
	
	
}
