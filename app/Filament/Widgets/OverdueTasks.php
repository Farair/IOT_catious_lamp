<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OverdueTasks extends BaseWidget
{
    protected function getCards(): array
    {
        $overdueTasksCount = Task::where('due_date', '<', now())
                                  ->where('done', false)
                                  ->count();

        return [
            Card::make(__('module_names.widgets.overdue_tasks'), $overdueTasksCount)
                ->description(__('fields.tasks_that_are_overdue'))
                ->color('danger'),
        ];
    }
}

