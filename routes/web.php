<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\AuthControllers\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Cv\CvController;
use App\Http\Controllers\Dashbaord\DashbaordController;
use App\Http\Controllers\Education\EducationController;
use App\Http\Controllers\Experience\ExperienceController;
use App\Http\Controllers\Favorite\FavoriteController;
use App\Http\Controllers\FrontEnd\GalleryFrontController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ProjectFrontController;
use App\Http\Controllers\FrontEnd\SkillFrontController;
use App\Http\Controllers\GalleryController\GalleryController;
use App\Http\Controllers\Language\LanguageController;
use App\Http\Controllers\Name\NameController;
use App\Http\Controllers\Project\CategoryController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Skill\SkillController;
use App\Http\Controllers\Tool\ToolController;
use App\Http\Controllers\UserControllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home.index');
// -----------------------login------------------------
Route::get('/login', [AuthController::class, 'index'])->name('login.index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/gallary', function () {
        return view('gallarys.index');
    });

    // admin dashbaord
    Route::get('/dashboard', [DashbaordController::class, 'index'])->name('dashboard.index');



    // ------------------------user---------------------------------
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    // ------------------------brands---------------------------------
    Route::get('/brand/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
    // ------------------------about---------------------------------
    Route::get('/about/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::post('/about/destroy', [AboutController::class, 'destroy'])->name('about.destroy');
    // ------------------------experience---------------------------------
    Route::get('/experience/index', [ExperienceController::class, 'index'])->name('experience.index');
    Route::get('/experience/create', [ExperienceController::class, 'create'])->name('experience.create');
    Route::post('/experience/store', [ExperienceController::class, 'store'])->name('experience.store');
    Route::get('/experience/edit/{id}', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::put('/experience/update/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::post('/experience/destroy', [ExperienceController::class, 'destroy'])->name('experience.destroy');
    // ------------------------education---------------------------------
    Route::get('/education/index', [EducationController::class, 'index'])->name('education.index');
    Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
    Route::post('/education/store', [EducationController::class, 'store'])->name('education.store');
    Route::get('/education/edit/{id}', [EducationController::class, 'edit'])->name('education.edit');
    Route::put('/education/update/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::post('/education/destroy', [EducationController::class, 'destroy'])->name('education.destroy');
    // ------------------------language---------------------------------
    Route::get('/language/index', [LanguageController::class, 'index'])->name('language.index');
    Route::get('/language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
    Route::put('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::post('/language/destroy', [LanguageController::class, 'destroy'])->name('language.destroy');


    // ------------------------skill---------------------------------
    Route::get('/skill/index', [SkillController::class, 'index'])->name('skill.index');
    Route::get('/skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('/skill/store', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/skill/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('/skill/update/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::post('/skill/destroy', [SkillController::class, 'destroy'])->name('skill.destroy');
    // ------------------------contact---------------------------------
    Route::get('/contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::post('/contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
    // ------------------------project---------------------------------
    Route::get('/project/index', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::get('/project/show/{id}', [ProjectController::class, 'show'])->name('project.show');
    Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::post('/project/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');
    // ------------------------category---------------------------------
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    // ------------------------category---------------------------------
    Route::get('/gallery/index', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('/gallery/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::post('/photo/delete', [GalleryController::class, 'photoDelete'])->name('photo.delete');


    // ------------------------CV---------------------------------
    Route::get('/cv/index', [CvController::class, 'index'])->name('cv.index');
    Route::get('/cv/create', [CvController::class, 'create'])->name('cv.create');
    Route::post('/cv/store', [CvController::class, 'store'])->name('cv.store');
    Route::get('/cv/edit/{id}', [CvController::class, 'edit'])->name('cv.edit');
    Route::put('/cv/update/{id}', [CvController::class, 'update'])->name('cv.update');
    Route::post('/cv/destroy', [CvController::class, 'destroy'])->name('cv.destroy');
    Route::post('/cv/delete', [CvController::class, 'photoDelete'])->name('cv.delete');

    // ------------------------name---------------------------------
    Route::get('/name/index', [NameController::class, 'index'])->name('name.index');
    Route::get('/name/create', [NameController::class, 'create'])->name('name.create');
    Route::post('/name/store', [NameController::class, 'store'])->name('name.store');
    Route::get('/name/edit/{id}', [NameController::class, 'edit'])->name('name.edit');
    Route::put('/name/update/{id}', [NameController::class, 'update'])->name('name.update');
    Route::get('/name/show/{id}', [NameController::class, 'show'])->name('name.show');



    Route::post('/name/destroy', [NameController::class, 'destroy'])->name('name.destroy');
    Route::post('/name/delete', [NameController::class, 'photoDelete'])->name('name.delete');
    // ------------------------Tool---------------------------------
    Route::get('/tool/index', [ToolController::class, 'index'])->name('tool.index');
    Route::get('/tool/create', [ToolController::class, 'create'])->name('tool.create');
    Route::post('/tool/store', [ToolController::class, 'store'])->name('tool.store');
    Route::get('/tool/edit/{id}', [ToolController::class, 'edit'])->name('tool.edit');
    Route::put('/tool/update/{id}', [ToolController::class, 'update'])->name('tool.update');
    Route::post('/tool/destroy', [ToolController::class, 'destroy'])->name('tool.destroy');
    Route::post('/tool/delete', [ToolController::class, 'photoDelete'])->name('tool.delete');
    // ------------------------Favorite---------------------------------
    Route::get('/favorite/index', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::get('/favorite/create', [FavoriteController::class, 'create'])->name('favorite.create');
    Route::post('/favorite/store', [FavoriteController::class, 'store'])->name('favorite.store');
    Route::get('/favorite/edit/{id}', [FavoriteController::class, 'edit'])->name('favorite.edit');
    Route::put('/favorite/update/{id}', [FavoriteController::class, 'update'])->name('favorite.update');
    Route::post('/favorite/destroy', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
    Route::post('/favorite/delete', [FavoriteController::class, 'photoDelete'])->name('favorite.delete');



    // ------------------------Favorite---------------------------------
    Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('/blog/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');
});














// -------------------------------------------------------------------front end page 0------------------------------------------------------------

Route::get('/project/detail/{id}', [ProjectFrontController::class, 'show'])->name('project.detail');
Route::get('/project/inex', [ProjectFrontController::class, 'index'])->name('projectfront.index');
Route::get('/project/view/{id}', [ProjectFrontController::class, 'view'])->name('projectfront.view');
// ---------------------------------------gallery---------------------------------------
Route::get('/gallery/index', [GalleryFrontController::class, 'index'])->name('gallery.index');

// ---------------------------------------skill---------------------------------------
Route::get('/skill/detail/{id}', [SkillFrontController::class, 'show'])->name('skillFront.detail');
// Routes that don't require authentication
Route::post('/login/store', [AuthController::class, 'store'])->name('login.store');

Route::fallback(function () {
    return view('notFoundPage');
});
