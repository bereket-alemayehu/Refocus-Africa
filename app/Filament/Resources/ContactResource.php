<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Contact;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ContactResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactResource\RelationManagers;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('proffession')
                    ->label('Proffession')
                    ->required()
                    ->maxLength(255),

                Select::make('education')
                    ->label('Education Level')
                    ->required()
                    ->options([
                        'highschool' => 'Highschool',
                        'bachelors' => 'Bachelors',
                        'masters' => 'Masters',
                        'phd' => 'PhD',
                    ]),

                TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->maxLength(20),

                Textarea::make('suggestion')
                    ->label('Suggestion / Recommendation')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Full Name')->sortable()->searchable(),
                TextColumn::make('proffession')->label('Proffession')->sortable()->searchable(),
                TextColumn::make('education')->label('Education Level')->sortable(),
                TextColumn::make('address')->label('Address')->limit(30),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone Number')->sortable()->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
                Tables\Actions\DeleteAction::make()
                    ->slideOver(),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
