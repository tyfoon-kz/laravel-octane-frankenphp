<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sku')->searchable()->sortable()->copyable(),
                TextColumn::make('name')->searchable()->sortable()->limit(40),
                TextColumn::make('category.name')->sortable()->toggleable(),
                TextColumn::make('unit.code')->sortable()->toggleable(),
                TextColumn::make('supplier.name')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('price')->money('KZT')->sortable(),
                TextColumn::make('stock')->sortable(),
                IconColumn::make('is_active')->boolean()->sortable(),
            ])
            ->filters([
                SelectFilter::make('category_id')->relationship('category', 'name')->label('Category')->searchable()->preload(),
                TernaryFilter::make('is_active'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()->requiresConfirmation(),
            ])
            ->toolbarActions([]);
    }
}
