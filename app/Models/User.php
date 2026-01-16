<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\LoyaltyPoint;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
protected $fillable = [
    'name',
    'email',
    'password',
    'is_admin', // ← مهم
];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function loyaltyPoints() {
    return $this->hasMany(LoyaltyPoint::class);
}
public function addPoints($activity, $points)
{
    $record = $this->loyaltyPoints()->create([
        'activity' => $activity,
        'points' => $points
    ]);

    $this->refreshLoyaltyLevel();

    return $record;
}

public function totalPoints() {
    return $this->loyaltyPoints()->sum('points');
}
public function getLoyaltyLevel()
{
    $points = $this->totalPoints();

    if ($points >= 1000) return 'platinum';
    if ($points >= 500) return 'gold';
    if ($points >= 200) return 'silver';
    return 'bronze';
}
public function refreshLoyaltyLevel()
{
    $this->update([
        'loyalty_level' => $this->getLoyaltyLevel()
    ]);
}
public function redemptions() {
    return $this->hasMany(Redemption::class);
}
// public function totalPoints()
// {
//     return $this->points()->sum('points');
// }

public function level()
{
    $total = $this->totalPoints();

    return match (true) {
        $total >= 1000 => 'Platinum',
        $total >= 500 => 'Gold',
        $total >= 200 => 'Silver',
        default => 'Bronze',
    };
}
public function tier()
{
    $total = $this->totalPoints();

    if($total >= 1000) return 'Platinum';
    if($total >= 500) return 'Gold';
    if($total >= 200) return 'Silver';
    return 'Bronze';
}
public function points()
{
    return $this->hasMany(\App\Models\Point::class);

}

}
