<div class="bg-gray-100 font-sans">
    <div class="p-8">
        <header class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold">Orders</h2>
                <p class="text-sm text-gray-500">Home / Orders</p>
            </div>
            <div class="flex items-center">
                <button class="text-gray-500 focus:outline-none mr-4">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="text-gray-500 focus:outline-none">
                    <i class="fas fa-bell"></i>
                </button>
            </div>
        </header>

        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center border rounded">
                <input type="text" placeholder="Search" class="border-0 p-2 focus:outline-none">
                <i class="fas fa-search text-gray-500 mr-2"></i>
            </div>
            <div class="flex items-center">
                <select class="border p-2 rounded mr-2">
                    <option>All Status</option>
                </select>
                <input type="text" placeholder="10 Apr - 20 Apr" class="border p-2 rounded mr-2">
                <button class="bg-gray-200 px-4 py-2 rounded mr-2">
                    <i class="fas fa-calendar-alt"></i>
                </button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded">Export</button>
            </div>
        </div>

        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left py-2">Order Id</th>
                    <th class="text-left py-2">Customer</th>
                    <th class="text-left py-2">Items</th>
                    <th class="text-left py-2">Amount</th>
                    <th class="text-left py-2">Status</th>
                    <th class="text-left py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2"># 001001 <br> April 29, 2023</td>
                    <td class="py-2">
                        Devon Lane <br>
                        3517 W. Gray St. Utica, <br>
                        Pennsylvania 57867
                    </td>
                    <td class="py-2">1</td>
                    <td class="py-2">$ 293</td>
                    <td class="py-2">New Order</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"># 001002 <br> April 29, 2023</td>
                    <td class="py-2">
                        Arlene McCoy <br>
                        2972 Westheimer Rd. <br>
                        Santa Ana, Illinois 85486
                    </td>
                    <td class="py-2">5</td>
                    <td class="py-2">$ 854</td>
                    <td class="py-2">New Order</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"># 001003 <br> April 29, 2023</td>
                    <td class="py-2">
                        Leslie Alexander <br>
                        2715 Ash Dr. San Jose, <br>
                        South Dakota 83475
                    </td>
                    <td class="py-2">4</td>
                    <td class="py-2">$ 576</td>
                    <td class="py-2">New Order</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"># 001004 <br> April 29, 2023</td>
                    <td class="py-2">
                        Savannah Nguyen <br>
                        3517 W. Gray St. Utica, <br>
                        Pennsylvania 57867
                    </td>
                    <td class="py-2">3</td>
                    <td class="py-2">$ 446</td>
                    <td class="py-2">Processed</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"># 001005 <br> April 29, 2023</td>
                    <td class="py-2">
                        Courtney Henry <br>
                        4140 Parker Rd. <br>
                        Allentown, New Mexico 31134
                    </td>
                    <td class="py-2">3</td>
                    <td class="py-2">$ 406</td>
                    <td class="py-2">Processed</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
                <tr>
                    <td class="py-2"># 001006 <br> April 29, 2023</td>
                    <td class="py-2">
                        Darrell Steward <br>
                        1901 Thornridge Cir.
                    </td>
                    <td class="py-2">2</td>
                    <td class="py-2">$ 782</td>
                    <td class="py-2">Canceled</td>
                    <td class="py-2">
                        <i class="fas fa-edit text-blue-500"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</html>