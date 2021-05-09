<?php
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\Cart;
// use Illuminate\Contracts\Session\Session;

// use Auth;
class Helper{
    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    } 
    public static function getAllCategory(){
        $category=new Category();
        $menu=$category->getAllParentWithChild();
        return $menu;
    } 
    
    public static function getHeaderCategory(){
        $category = new Category();
        // dd($category);
        $menu=$category->getAllParentWithChild();

        if($menu){
            ?>
            
            <li>
            <a href="javascript:void(0);">Danh mục<i class="ti-angle-down"></i></a>
                <ul class="dropdown border-0 shadow">
                <?php
                    foreach($menu as $cat_info){
                        if($cat_info->child_cat->count()>0){
                            ?>
                            <li><a href="<?php echo route('product-cat',$cat_info->slug); ?>"><?php echo $cat_info->title; ?></a>
                                <ul class="dropdown sub-dropdown border-0 shadow">
                                    <?php
                                    foreach($cat_info->child_cat as $sub_menu){
                                        ?>
                                        <li><a href="<?php echo route('product-sub-cat',[$cat_info->slug,$sub_menu->slug]); ?>"><?php echo $sub_menu->title; ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                                <li><a href="<?php echo route('product-cat',$cat_info->slug);?>"><?php echo $cat_info->title; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </li>
        <?php
        }
    }

    public static function productCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('products')->orderBy('id','DESC')->get();
    }

    public static function postTagList($option='all'){
        if($option='all'){
            return PostTag::orderBy('id','desc')->get();
        }
        return PostTag::has('posts')->orderBy('id','desc')->get();
    }

    public static function postCategoryList($option="all"){
        if($option='all'){
            return PostCategory::orderBy('id','DESC')->get();
        }
        return PostCategory::has('posts')->orderBy('id','DESC')->get();
    }
    // Cart Count
    public static function cartCount($user_id=''){
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $cart = Cart::where('session_id', $id_user)->first();
            if($cart!=null){
                $cart->user_id = $user_id;
                $cart->save();
            }
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('quantity');
        }
        else{
            // return 0;
            return Cart::where('session_id', $id_user)->where('order_id',null)->sum('quantity');
        }
    }
    // relationship cart with product
    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public static function getAllProductFromCart($user_id=''){
        // $id_user = session()->getid();
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $cart = Cart::where('session_id', $id_user)->first();
            if($cart!=null){
                $cart->user_id = $user_id;
                $cart->save();
            }
            return Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
        }
        else{
            return Cart::with('product')->where('session_id', $id_user)->where('order_id',null)->get();
            // return Cart::with('product')->where('user_id',null)->where('order_id',null)->get();;
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id=''){
        // $id_user = session()->getid();
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $cart = Cart::where('session_id', $id_user)->first();
            if($cart!=null){
                $cart->user_id = $user_id;
                $cart->save();
            }
            return Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            // return 0;
            return Cart::where('session_id', $id_user)->where('order_id',null)->sum('amount');
        }
    }
    // Wishlist Count
    public static function wishlistCount($user_id=''){
        // $id_user = session()->getid();
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $wishlist = Wishlist::where('session_id', $id_user)->first();
            if($wishlist!=null){
                $wishlist->user_id = $user_id;
                $wishlist->save();
            }
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('quantity');
        }
        else{
            // return 0;
            return Wishlist::where('session_id', $id_user)->where('cart_id',null)->sum('quantity');
        }
    }
    public static function getAllProductFromWishlist($user_id=''){
        // $id_user = session()->getid();
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $wishlist = Wishlist::where('session_id', $id_user)->first();
            if($wishlist!=null){
                $wishlist->user_id = $user_id;
                $wishlist->save();
            }
            return Wishlist::with('product')->where('user_id',$user_id)->where('cart_id',null)->get();
        }
        else{
            // return 0;
            return Wishlist::with('product')->where('session_id', $id_user)->where('cart_id',null)->get();;
        }
    }
    public static function totalWishlistPrice($user_id=''){
        // $id_user = session()->getid();
        $id_user = session()->get('session_id');
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            $wishlist = Wishlist::where('session_id', $id_user)->first();
            if($wishlist!=null){
                $wishlist->user_id = $user_id;
                $wishlist->save();
            }
            return Wishlist::where('user_id',$user_id)->where('cart_id',null)->sum('amount');
        }
        else{
            // return 0;
            return Wishlist::where('session_id', $id_user)->where('cart_id',null)->sum('amount');
        }
    }

    // Total price with shipping and coupon
    public static function grandPrice($id,$user_id){
        $order=Order::find($id);
        dd($id);
        if($order){
            $shipping_price=(float)$order->shipping->price;
            $order_price=self::orderPrice($id,$user_id);
            return number_format((float)($order_price+$shipping_price),'.','');
        }else{
            return 0;
        }
    }


    // Admin home
    public static function earningPerMonth(){
        $month_data=Order::where('status','delivered')->get();
        // return $month_data;
        $price=0;
        foreach($month_data as $data){
            $price = $data->cart_info->sum('price');
        }
        return number_format((float)($price),'.','');
    }

    public static function shipping(){
        return Shipping::orderBy('id','DESC')->get();
    }
}

?>