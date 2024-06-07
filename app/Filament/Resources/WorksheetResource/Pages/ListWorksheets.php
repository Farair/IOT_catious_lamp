<?php

namespace App\Filament\Resources\WorksheetResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\WorksheetResource;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Worksheet;
use App\Enums\WorksheetPriority;

class ListWorksheets extends ListRecords
{
  protected static string $resource = WorksheetResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\CreateAction::make(),
    ];
  }

  public ?string $activeTab = 'all';
}

