<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\ProductContact;
use App\Models\Quartier;
use App\Models\Ville;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products = Annonce::where('Status', 1)->take(8)->get();

        $categoryConseils = Categorie::where('title', 'Conseils')->first();
        $conseils = $categoryConseils->blogs()->where('Status', 1)->where('approved', 1)->take(8)->get();

        $villes = Ville::get();
        $quartiers = Quartier::get();
        $nbr_pieces = Annonce::where('type_id', 1)->max('nbr_chambres');

        return view('home', [
            'conseils' => $conseils,
            'nbr_pieces' => $nbr_pieces,
            'products' => $products,
            'villes' => $villes,
            'quartiers' => $quartiers,
            'category_id' => '',
            'type_id' => '',
            'reference' => '',
            'ville' => '',
            'quartier' => '',
            'nbr_chambres' => '',
            'surface_min' => '',
            'prix_max' => '',
        ]);
    }



    public function achat(Request $request)
    {
        if ($request->category_id) {
            $products = Annonce::where('Status', 1)
                ->whereIn('type_id', [1, 3])
                ->when($request->ville, function ($q) use ($request) {
                    $q->where('id_ville', $request->ville);
                })->when($request->quartier, function ($q) use ($request) {
                    $q->where('id_quartier', $request->quartier);
                })->when($request->nbr_pieces, function ($q) use ($request) {
                    if ($request->nbr_pieces < 7) {
                        $q->where('nbr_chambres', '=', $request->nbr_pieces);
                    } else {
                        $q->where('nbr_chambres', '>', $request->nbr_pieces);
                    }
                })->when($request->surface_min, function ($q) use ($request) {
                    $q->where('surface', '>', $request->surface_min);
                })->when($request->prix_max, function ($q) use ($request) {
                    $q->where('prix', '<', $request->prix_max);
                })->get();
        } else {
            $products = Annonce::where('Status', 1)->where('type_id', 1)->get();
        }
        $villes = Ville::get();
        $quartiers = Quartier::get();
        $nbr_pieces = Annonce::where('type_id', 1)->max('nbr_chambres');

        return view('achat', [
            'products' => $products,
            'villes' => $villes,
            'quartiers' => $quartiers,
            'nbr_pieces' => $nbr_pieces,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'reference' => $request->reference,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'nbr_chambres' => $request->nbr_chambres,
            'surface_min' => $request->surface_min,
            'prix_max' => $request->prix_max,
        ]);
    }

    public function location(Request $request)
    {
        if ($request->category_id) {
            $products = Annonce::query()
                ->where('Status', 1)
                ->when($request->category_id, function ($q) use ($request) {
                    $q->where('type_id', $request->category_id);
                })->when($request->ville, function ($q) use ($request) {
                    $q->where('id_ville', $request->ville);
                })->when($request->quartier, function ($q) use ($request) {
                    $q->where('id_quartier', $request->quartier);
                })->when($request->nbr_pieces, function ($q) use ($request) {
                    if ($request->nbr_pieces < 7) {
                        $q->where('nbr_chambres', '=', $request->nbr_pieces);
                    } else {
                        $q->where('nbr_chambres', '>', $request->nbr_pieces);
                    }
                })->when($request->surface_min, function ($q) use ($request) {
                    $q->where('surface', '>', $request->surface_min);
                })->when($request->prix_max, function ($q) use ($request) {
                    $q->where('prix', '<', $request->prix_max);
                })->get();
        } else {
            $products = Annonce::where([
                'Status' => 1,
                'type_id' => 2,
            ])->get();
        }


        $villes = Ville::get();
        $quartiers = Quartier::get();
        $nbr_pieces = Annonce::where('type_id', 2)->max('nbr_chambres');


        return view('location', [
            'products' => $products,
            'villes' => $villes,
            'quartiers' => $quartiers,
            'nbr_pieces' => $nbr_pieces,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'reference' => $request->reference,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'nbr_chambres' => $request->nbr_chambres,
            'surface_min' => $request->surface_min,
            'prix_max' => $request->prix_max,
        ]);
    }

    public function immoneuf(Request $request)
    {
        if ($request->category_id) {
            $products = Annonce::query()
                ->where('Status', 1)
                ->when($request->category_id, function ($q) use ($request) {
                    $q->where('type_id', $request->category_id);
                })->when($request->ville, function ($q) use ($request) {
                    $q->where('id_ville', $request->ville);
                })->when($request->quartier, function ($q) use ($request) {
                    $q->where('id_quartier', $request->quartier);
                })->when($request->nbr_pieces, function ($q) use ($request) {
                    if ($request->nbr_pieces < 7) {
                        $q->where('nbr_chambres', '=', $request->nbr_pieces);
                    } else {
                        $q->where('nbr_chambres', '>', $request->nbr_pieces);
                    }
                })->when($request->surface_min, function ($q) use ($request) {
                    $q->where('surface', '>', $request->surface_min);
                })->when($request->prix_max, function ($q) use ($request) {
                    $q->where('prix', '<', $request->prix_max);
                })->get();
        } else {
            $products = Annonce::where([
                'Status' => 1,
                'type_id' => 3,
            ])->get();
        }


        $villes = Ville::get();
        $quartiers = Quartier::get();
        $nbr_pieces = Annonce::where('type_id', 3)->max('nbr_chambres');

        return view('immoneuf', [
            'products' => $products,
            'villes' => $villes,
            'quartiers' => $quartiers,
            'nbr_pieces' => $nbr_pieces,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'reference' => $request->reference,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'nbr_chambres' => $request->nbr_chambres,
            'surface_min' => $request->surface_min,
            'prix_max' => $request->prix_max,
        ]);
    }

    public function vacances(Request $request)
    {
        if ($request->category_id) {
            $products = Annonce::query()
                ->where('Status', 1)
                ->when($request->category_id, function ($q) use ($request) {
                    $q->where('type_id', $request->category_id);
                })->when($request->ville, function ($q) use ($request) {
                    $q->where('id_ville', $request->ville);
                })->when($request->quartier, function ($q) use ($request) {
                    $q->where('id_quartier', $request->quartier);
                })->when($request->nbr_pieces, function ($q) use ($request) {
                    if ($request->nbr_pieces < 7) {
                        $q->where('nbr_chambres', '=', $request->nbr_pieces);
                    } else {
                        $q->where('nbr_chambres', '>', $request->nbr_pieces);
                    }
                })->when($request->surface_min, function ($q) use ($request) {
                    $q->where('surface', '>', $request->surface_min);
                })->when($request->prix_max, function ($q) use ($request) {
                    $q->where('prix', '<', $request->prix_max);
                })->get();
        } else {
            $products = Annonce::where([
                'Status' => 1,
                'type_id' => 4,
            ])->get();
        }


        $villes = Ville::get();
        $quartiers = Quartier::get();
        $nbr_pieces = Annonce::where('type_id', 4)->max('nbr_chambres');


        return view('vacances', [
            'products' => $products,
            'villes' => $villes,
            'quartiers' => $quartiers,
            'nbr_pieces' => $nbr_pieces,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'reference' => $request->reference,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'nbr_chambres' => $request->nbr_chambres,
            'surface_min' => $request->surface_min,
            'prix_max' => $request->prix_max,
        ]);
    }

    public function conseils(Request $request)
    {
        $term = $request->input('search');

        if ($term == '' || $term == null) {
            $type = Categorie::where('title', 'Conseils')->get();
            $conseils = $type[0]->blogs()->where('Status', 1)->where('approved', 1)->get();

            return view('conseils', [
                'conseils' => $conseils,
            ]);
        } else {
            $type = Categorie::where('title', 'Conseils')->get();
            $conseils = $type[0]->blogs()
                ->where('Status', 1)->where('approved', 1)
                ->where('title', 'like', '%' . $term . '%')
                ->orWhere('subtitle', 'like', '%' . $term . '%')
                ->orWhere('tags', 'like', '%' . $term . '%')
                ->groupBy('blogs.id')
                ->get();
            return view('conseils', [
                'conseils' => $conseils,
                'term' => $term,
            ]);
        }
    }

    public function filterConseils(Request $request)
    {
        $c = Categorie::where('title', 'Conseils')->first();
        $ids = $c->blogs()->pluck('blogs.id')->toArray();
        $searchInput = $request->searchInput;
        $conseils = Blog::whereIn('blogs.id', $ids)
            ->where(function ($q) use ($searchInput) {
                if ($searchInput != "") {
                    $q->where('title', 'like', '%' . $searchInput . '%')
                        ->orWhere('text', 'like', '%' . $searchInput . '%')
                        ->orWhere('subtitle', 'like', '%' . $searchInput . '%')
                        ->orWhere('tags', 'like', '%' . $searchInput . '%');
                }
            })
            ->where('Status', 1)->where('approved', 1)
            ->get();

        return response()->json([
            'conseils' => $conseils,
        ]);
    }

    public function getQuartier(Request $request)
    {
        if ($request->title == '' || $request->title == 'Villes') {
            $quartiers = Quartier::get();
        } else {
            $ville = Ville::where('title', $request->title)->first();
            $quartiers = $ville->quartiers()->get();
        }

        return response()->json(['quartiers' => $quartiers]);
    }

    public function blogDetails($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();
        $blog->vues++;
        $blog->save();
        $catgs = $blog->categories()->pluck('categorie_id')->toArray();
        $similaires = Blog::leftjoin('blog_has_categories', 'blog_has_categories.blog_id', 'blogs.id')
            ->where('Status', 1)->where('approved', 1)
            ->select('blogs.*')
            ->whereIn('blog_has_categories.categorie_id', $catgs)
            ->where('blogs.id', '!=', $id)
            ->groupBy('blogs.id')
            ->get();

        $achat = Annonce::where('Status', 1)->where('type_id', 1)->get()->take(5);
        $location = Annonce::where('Status', 1)->where('type_id', 2)->get()->take(5);
        $immoneuf = Annonce::where('Status', 1)->where('type_id', 3)->get()->take(5);
        $vacances = Annonce::where('Status', 1)->where('type_id', 4)->get()->take(5);

        return view('blogDetail', [
            'blog' => $blog,
            'similaires' => $similaires,
            'achat' => $achat,
            'location' => $location,
            'immoneuf' => $immoneuf,
            'vacances' => $vacances,
        ]);
    }

    public function villeDetails($id)
    {
        $ville = Ville::where('title', $id)->firstOrFail();
        $blogs = Blog::where('ville_id', $ville->id)->where('Status', 1)->where('approved', 1)->get();


        $achat_links = VilleLinks::where('type', 'achat')->take(5)->get();
        $location_links = VilleLinks::where('type', 'location')->take(5)->get();
        $immoneuf_links = VilleLinks::where('type', 'immoneuf')->take(5)->get();
        $vacances_links = VilleLinks::where('type', 'vacances')->take(5)->get();


        return view('villeDetails', [
            'ville' => $ville,
            'blogs' => $blogs,
            'achat_links' => $achat_links,
            'location_links' => $location_links,
            'immoneuf_links' => $immoneuf_links,
            'vacances_links' => $vacances_links,
        ]);
    }

    public function produit($id)
    {
        $p = Annonce::where('id', $id)->firstOrFail();
        $p->vues++;
        $p->save();
        $products = Annonce::where([
            'Status' => 1,
            'id_ville' => $p->ville,
            'type_id' => $p->type_id,
        ])->where('annonces.id', '!=', $id)->take(3)->get();

        $title = $p->type->Titre;
        switch ($title) {
            case 'Achat':
                $color = 'blue';
                break;
            case 'Location':
                $color = 'blue';
                break;
            case 'ImmoNeuf':
                $color = 'green';
                break;
            case 'Vacances':
                $color = 'orange';
                break;
            default:
                $color = 'blue';
                break;
        }

        return view('produit', [
            'product' => $p,
            'products' => $products,
            'color' => $color
        ]);
    }

    public function vues_phone(Request $request)
    {
        $p = Annonce::find($request->id);
        $p->vues_phone++;
        $p->save();
        return response()->json(['success' => 'Blog has been updated succesfuly']);
    }



    public function produitContact($id, Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|min:5|max:30',
            'phone' => 'required|digits:10',
            'email' => 'nullable|email|min:5|max:255',
            'message' => 'required|string|min:5|max:255',
        ]);

        $fullname = $request->fullname;
        $phone = $request->phone;
        $email = $request->email;
        $message = $request->message;

        $contact = new ProductContact();
        $contact->annonce_id = $id;
        $contact->fullname = $fullname;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->message = $message;
        $contact->save();

        return redirect()->back()->with('success', 'Envoyé avec success');
    }
}
