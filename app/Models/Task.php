<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    private string $id;
    private string $description;
    private string $status;
    private string $createdAt;
    private string $updatedAt;

    public const STATUS_STARTED = 'started';
    public const STATUS_FINISHED = 'finished';

    private const STATUS = [
        self::STATUS_STARTED,
        self::STATUS_FINISHED,
    ];

    public function __construct(
        string  $id,
        string  $description,
        ?string $status = null,
        ?string $createdAt = null,
        ?string $updatedAt = null
    )
    {

        $this->id = $id;
        $this->description = $description;
        $this->setStatus($status ?? Task::STATUS_STARTED);
        $this->createdAt = $createdAt ?? Carbon::now();
        $this->updatedAt = $updatedAt;
    }
}
