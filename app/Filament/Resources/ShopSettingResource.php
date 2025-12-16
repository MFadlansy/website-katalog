<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShopSettingResource\Pages;
use App\Filament\Resources\ShopSettingResource\RelationManagers;
use App\Models\ShopSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShopSettingResource extends Resource
{
    protected static ?string $model = ShopSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identitas Toko')
                    ->schema([
                        Forms\Components\TextInput::make('shop_name')
                            ->label('Nama Toko')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp (Cth: 62812xxx)')
                            ->numeric()
                            ->required()
                            ->helperText('Gunakan kode negara (62) di depan, jangan pakai 08.'),
                    ])->columns(2),

                Forms\Components\Section::make('Detail Informasi')
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat Toko / Deskripsi Singkat')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('bank_info')
                            ->label('Informasi Pembayaran (Bank/E-Wallet)')
                            ->toolbarButtons([
                                'bold', 'italic', 'bulletList', 'orderedList', 'redo', 'undo',
                            ])
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('instagram_link')
                            ->label('Link Instagram')
                            ->url()
                            ->prefix('https://'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('shop_name')
                    ->label('Nama Toko')
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('Nomor WA'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Terakhir Update'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false); 
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
            'index' => Pages\ListShopSettings::route('/'),
            'create' => Pages\CreateShopSetting::route('/create'),
            'edit' => Pages\EditShopSetting::route('/{record}/edit'),
        ];
    }
}
