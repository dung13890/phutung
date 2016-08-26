<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Repositories\Contracts\MenuRepository;

class Serialize extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MenuRepository $repository)
    {
        $this->recursive($repository, json_decode($this->attributes['serialize']));
    }

    public function recursive(MenuRepository $repository, array $data, $parent = 0, $order = 0)
    {
        foreach ($data as $value) {
            $order++;
            if (isset($value->children)) {
                $this->recursive($repository, $value->children, $value->id, $orderChildren = 0);
            }
            $repository->find($value->id)->update([
                'order' => $order,
                'parent_id' => $parent
            ]);
        }
    }
}
