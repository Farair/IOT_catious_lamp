<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use Filament\Widgets\LineChartWidget;

class TasksChart extends LineChartWidget
{
    protected static ?string $heading = 'Napi teljesítmény';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Elkészült Feladatok száma',
                    'data' => Task::tasksByDay(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}
