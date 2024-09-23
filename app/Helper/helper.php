<?php
namespace App\Helpers; // Your helpers namespace
use App\Models\User;
use App\Company;
use App\Models\About;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Gallery;
use App\Models\IconBox;
use App\Models\Service;
use Auth;
class UserHelper
{
    public static function getAbout(): ?object
    {
        return About::get();
    }
    public static function getIcon(): ?object
    {
        return IconBox::get();
    }
    public static function getServices(): ?object
    {
        return Service::get();
    }
    public static function getDepartments(): ?object
    {
        return Department::get();
    }
    public static function getDoctor(): ?object
    {
        return Doctor::get();
    }
    public static function getImage(): ?object
    {
        return Gallery::get();
    }

}
