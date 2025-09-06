<?php

namespace App\Livewire\Filament;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


class LanguageSwitcher extends Component
{
    public $selected;

    public function mount()
    {
        $this->selected = Auth::user()?->language_id ?? 1;
    }
    public function doSomething()
    {
        dd("It works!");
    }
    public function updatedSelected($value)
    {
        
        $user = Auth::user();
        if ($user) {
            $user->language_id = $value;
            $user->save();
        }

        // Set app locale immediately
        $language = \App\Models\Language::find($value);
        dd( $language);
        App::setLocale($language?->code ?? 'es');

        // Optional: store in session too
        session(['locale' => $language?->code ?? 'en']);
    }

    public function render()
    {
        return view('livewire.filament.language-switcher', [
            'languages' => \App\Models\Language::all(),
        ]);
    }
}