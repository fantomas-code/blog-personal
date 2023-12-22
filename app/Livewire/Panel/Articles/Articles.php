<?php

namespace App\Livewire\Panel\Articles;


use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Title;

class Articles extends Component
{
    public $search = '';

    public function delete($id) {                                                           
        $article = Article::find($id);
 
        $article->delete();

        return to_route('article.index')->with('msg', __('Deleted article'));
    }
    
    #[Title('Artículos 😎')]
    public function render()
    {
        return view('livewire.panel.articles.articles', [
            'articles' => Article::where('title', 'like', "%{$this->search}%")->latest()->get()
        ]);
    }
}
