<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function index(){
        $title = "";
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dalam Kategori ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' ditulis oleh ' . $author->name;
        }

        return view('posts', [
            "title" => "Kumpulan posts" . $title,
            "active"=> "posts",
//            "posts" => Post::latest()->filter()->get()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "title" => "posts",
            "active"=> "posts",
            "post" => $post
        ]);
    }
}

/* <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta labore, eum autem itaque rem sapiente ab amet illo, pariatur magnam laboriosam quibusdam ipsa architecto aliquid alias laudantium dolore, recusandae assumenda unde corporis ullam consectetur asperiores? Corporis, quis? </p><p>Incidunt impedit consectetur repellat minus aliquam commodi voluptate! Consequuntur voluptates nobis saepe modi ratione veritatis, quisquam iusto dolor cumque? Impedit ab nisi placeat quasi deserunt consequuntur corrupti facere distinctio dicta eaque incidunt amet, labore dolorum, cumque odit tempora beatae molestiae? Eveniet, at illo corporis modi consectetur atque a blanditiis dolor obcaecati ipsa qui vel cum vitae illum porro officiis? Facere, dignissimos. </p><p>Quisquam placeat, nostrum consequatur inventore debitis molestiae quod numquam obcaecati sint vitae odio possimus quam, laudantium aperiam quasi dolore sequi commodi. Doloremque mollitia, vitae deleniti, impedit, inventore asperiores aperiam amet distinctio perspiciatis eaque consectetur? Officiis, voluptatibus aspernatur! Nisi assumenda magni reiciendis aspernatur voluptatum eum eligendi aliquid labore vero nulla, deleniti mollitia consequuntur similique velit id in perferendis fugit voluptatem rerum. Ducimus, provident minima, corporis laborum natus assumenda, perspiciatis quae laboriosam eligendi id ipsa officia possimus quia et aliquid quibusdam hic voluptatem illum rerum. </p><p>Distinctio inventore quos omnis at totam placeat nesciunt officia veniam excepturi ipsa odio rem repudiandae modi ex eos ea eaque sunt corporis in, et deleniti iusto! Hic debitis fuga perferendis dolor consequuntur magni optio quo! Consectetur corrupti assumenda nostrum doloribus voluptate, perspiciatis cumque nobis repellendus quod optio illum, nulla necessitatibus fugit neque perferendis natus ipsam facilis sed quis vitae molestiae nesciunt qui. Similique possimus officiis voluptas adipisci atque, aperiam optio facilis totam expedita. Eos consectetur ut soluta reprehenderit ratione consequatur quod totam quam itaque sed, veniam inventore, dignissimos tempore aliquam neque enim dolor voluptatibus perferendis est. Aut, nisi! Ipsa, eveniet. Reiciendis deleniti tenetur ratione asperiores minus. </p><p>Inventore laudantium delectus sequi quas facere quos quasi aperiam tenetur a aut molestias, porro aspernatur fugit esse. Et voluptate commodi rerum suscipit assumenda accusamus consequatur dignissimos illum. Fugit modi, aliquam esse, quod qui libero deleniti ducimus expedita dignissimos eveniet pariatur neque. Iste nam hic laborum iusto quo distinctio magni doloribus error commodi sunt omnis molestiae recusandae nulla repellat veniam ratione, esse impedit animi cupiditate natus. Esse iure ea eligendi atque asperiores quaerat voluptatem a cum sequi beatae, tempora nam soluta necessitatibus perferendis placeat perspiciatis officia corrupti repudiandae ut alias! Amet qui maxime nemo, blanditiis, esse minus aliquid quos delectus voluptatem earum vero? Alias sapiente at vero totam quaerat dolores aspernatur nam nostrum doloremque!</p>
 */
