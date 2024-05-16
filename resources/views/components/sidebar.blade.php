<div class="flex flex-row min-h-screen bg-gray-100 shadow-lg">
    <div class="flex flex-col w-full overflow-hidden bg-white sm:w-56">
      <div class="flex flex-col px-12 py-10">
        <div class="h-auto">
            <a href="/admin/overview" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Dashboard</a>
            <a href="/admin/products" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Product</a>
             <a href="/admin/category" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Category</a>
            <a href="/admin/orders" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Order</a>
            <a href="/admin/complains" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Complain</a>
            <a href="sales" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Sales</a>
            <a href="/profile" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-gray-500 transition-transform rounded-md sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-gray-600">Profile</a>
                @csrf
                <button type="submit" class="relative inline-flex items-center w-full p-2 my-2 text-sm font-medium text-red-500 transition-transform rounded-md sm:w-24 sm:text-md hover:translate-x-1 sm:hover:translate-x-6 hover:text-red-600">
                    Log out
                </button>
            </form>
        </div>
      </div>
    </div>
</div>
