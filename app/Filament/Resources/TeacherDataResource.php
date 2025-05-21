<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherDataResource\Pages;
use App\Filament\Resources\TeacherDataResource\RelationManagers;
use App\Models\TeacherData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherDataResource extends Resource
{
    protected static ?string $model = TeacherData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected $fillable = ['nama_guru', 'mata_pelajaran', 'nomor_induk'];

    protected $casts = [
        'nomor_induk' => 'encrypted',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_guru')->required()->maxLength(255),
                TextInput::make('mata_pelajaran')->required()->maxLength(255),
                TextInput::make('NIP')->required()->maxLength(50)->unique(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_guru'),
                TextColumn::make('mata_pelajaran'),
                TextColumn::make('NIP'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeacherData::route('/'),
            'create' => Pages\CreateTeacherData::route('/create'),
            'edit' => Pages\EditTeacherData::route('/{record}/edit'),
        ];
    }

   public static function canViewAny(): bool
   {
    return auth()->user()->hasRole('admin');
   }
}
