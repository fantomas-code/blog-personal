<?php

namespace App\Livewire\Panel\Articles;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;


class ArticleForm extends Component
{
    use WithFileUploads;

    public Article $article;
    public $image;

    protected function rules(): array {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'article.title' => 'required|min:3',
            'article.slug' => [
                'alpha_dash',
                Rule::unique('articles', 'slug')->ignore($this->article),
            ],
            'article.body' => 'required|min:7|max:65,535',
        ];
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function updatedArticleTitle($title) {
        $this->article->slug = Str::slug($title);
    }

    public function mount(Article $article) {
        $this->article = $article;
    }

    public function register() {
        // dd('Si, pasa !!!');
        $this->validate();

        $this->article->image = $this->uploadImage();
        // if ($this->image) {
        // }

        auth()->user()->articles()->save($this->article);

        session()->flash('msg', __('Article saved'));

        return to_route('panel');
    }



    #[Title('Crear artículo ...')]
    public function render()
    {
        return view('livewire.panel.articles.article-form');
    }
}
