<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'cv_file' => Setting::get('cv_file'),
            'about_title' => Setting::get('about_title', 'About Me'),
            'about_description' => Setting::get('about_description'),
            'profile_image' => Setting::get('profile_image'),
            'hero_title' => Setting::get('hero_title', 'Hi, I\'m a Developer'),
            'hero_subtitle' => Setting::get('hero_subtitle'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero Section')
                    ->schema([
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Hero Title')
                            ->placeholder('Hi, I\'m a Developer')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('hero_subtitle')
                            ->label('Hero Subtitle')
                            ->rows(3)
                            ->placeholder('Full Stack Developer | Laravel Expert'),
                    ]),
                Forms\Components\Section::make('About Section')
                    ->schema([
                        Forms\Components\FileUpload::make('profile_image')
                            ->label('Profile Image')
                            ->image()
                            ->directory('profile')
                            ->imageEditor(),
                        Forms\Components\TextInput::make('about_title')
                            ->label('About Title')
                            ->default('About Me')
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('about_description')
                            ->label('About Description')
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('CV / Resume')
                    ->schema([
                        Forms\Components\FileUpload::make('cv_file')
                            ->label('Upload CV (PDF)')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('cv')
                            ->maxSize(5120),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
