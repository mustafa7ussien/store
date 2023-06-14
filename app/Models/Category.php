<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "name", "parent_id", "description", "image", "status", "slug"
    ];

    public static function rules($id = 0)
    {

        return
            [
                'name' => [
                    'required', 'string', 'min:3',
                    Rule::unique('categories', 'name')->ignore($id),
                    // function($attribute,$value,$fails)
                    // {
                    //     if(($value) =="Laravel")
                    //     {
                    //         $fails="This Name is Forbidden!!";


                    //     }
                    // }
                    new Filter(),



                ],
                'status' => 'required',
                'image' => 'max:1048576',

            ];
    }
}
