<?php

namespace App\Livewire\Panel\Articles;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ArticleCreateUpdate extends Component
{
    use WithFileUploads;

    public Article $article;

    // #[Validate('nullable|image|max:2048')]
    public $image;

    protected function rules(): array {
        return [
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            'image' => [
                Rule::requiredIf(! $this->article->image),
                Rule::when($this->image, ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']),
            ],
            'article.title' => 'required|min:3',
            'article.slug' => [
                'alpha_dash',
                Rule::unique('articles', 'slug')->ignore($this->article),
            ],
            'article.body' => 'required|min:7|max:65535',
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
        // $this->imageUrl = $image;
    }

    public function insertarticle() {

        $this->validate();
        
        if ($this->image) {
            $this->article->image = $this->loadimage();
        }
        // dd($this->loadimage());
        auth()->user()->articles()->save($this->article);
        
        return to_route('article.index')->with('msg', __('Article saved'));
    }

    public function loadimage() {

        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . config('services.imgur.client_id'),
        ])->attach('image', file_get_contents($this->image->getRealPath()), $this->image->getClientOriginalName())
            ->post('https://api.imgur.com/3/image');

        $data = $response->json();
        // dd($data);
        $this->cleanimage();
        return $this->image = $data['data']['link'];
        // Storage::cleanDirectory('livewire-tmp');
        // return (!empty($this->image = $data['data']['link'])) ? $this->image = $data['data']['link'] : [];
    }

    public function deleteImage()
    {
        $article = Article::query()->where('id', $this->article->id)->first();

        $article?->update(['image' => null]);
    }

    public function cleanimage()
    {
        $fileold = Storage::files('livewire-tmp');
        foreach ($fileold as $file) {
            Storage::delete($file);
        }
    }

    #[Title('Crear artículo 😎')]
    public function render()
    {
        return view('livewire.panel.articles.article-create-update', [
           'image' => $this->image
        ]);
    }
}
