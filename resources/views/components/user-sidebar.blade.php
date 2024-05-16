
    <div class="flex flex-col w-full bg-white sm:w-56">
      <div class="flex flex-col px-12 py-10">
        <div class="h-auto">

            <a href="/" class="{{ Request::is('/') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                Home
            </a>

            <a href="/best-sellers" class="{{ Request::is('best-sellers') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                Best Sellers
            </a>

            <a href="/promos" class="{{ Request::is('promos') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                Promos
            </a>

            <a href="/foods-and-treats" class="{{ Request::is('foods-and-treats') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                Foods and Treats
            </a>

            <a href="/accessories" class="{{ Request::is('accessories') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                Accessories
            </a>

            <a href="/user/orders" class="{{ Request::is('user/orders') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                My Orders
            </a>
        </div>
      </div>
      <div class="px-12 py-10 pt-56">
        <a href="/contact" class="{{ Request::is('contact') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
                <i class="mx-1 fa-solid fa-user"></i> Contact Us
            </a>
            <a href="/settings" class="{{ Request::is('settings') ? 'bg-slate-400 text-white' : '' }} relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md hover:text-white hover:bg-slate-400">
               <i class="mx-1 fa-solid fa-gear"></i> Settings
            </a>
      </div>

    </div>

