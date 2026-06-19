<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "package_id",
        "name",
        "address",
        "phone",
        "fax",
        "email",
        "website",
        "description",
        "logo",
        "payment_due_date",
        "is_approved"
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function contactPeople()
    {
        return $this->hasMany(ContactPerson::class);
    }
}
