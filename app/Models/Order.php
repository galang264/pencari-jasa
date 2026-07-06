<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Models\Service;
    use App\Models\User;

    class Order extends Model
    {
        use HasFactory;

        protected $fillable = [
            'service_id',
            'user_id',
            'work_address',
            'notes',
            'status',
            'order_date'
        ];

        public function service()
        {
            return $this->belongsTo(Service::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    }