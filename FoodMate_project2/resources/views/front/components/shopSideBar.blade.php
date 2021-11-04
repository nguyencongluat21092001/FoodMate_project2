
<div class="col-md-3 col-sm-12 col-lg-3">
    <form action="/shop/{{request()->segment(2) ?? ''}}" method="post">
        @csrf
    <div class="sidebar left">
        <div class="widget style2 Search_filters">
            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search
                Filters</h4>
            <div class="widget-data">
                <ul>
                    <li><a href="shop/" title="" itemprop="url" style="text-transform: capitalize">All</a></li>
                    @foreach($categories as $category)
                    <li><a href="shop/{{$category->id}}" title="" itemprop="url" style="text-transform: capitalize">{{$category->cate_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="widget style2 quick_filters">
            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Quick
                Filters</h4>
            <div class="widget-data">
                <ul>
                    <li><span class="radio-box"><input type="radio" name="filter-status" onchange="this.form.submit()"
                                                       id="filt1-0" value="all" checked {{request('filter-status') == 'all' ? 'checked' : ''}}><label
                                for="filt1-0">All</label></span></li>
                    <li><span class="radio-box"><input type="radio" name="filter-status" onchange="this.form.submit()"
                                                       id="filt1-1" value="featured" {{request('filter-status') == 'featured' ? 'checked' : ''}}><label
                                for="filt1-1">Featured</label></span></li>
                    <li><span class="radio-box"><input type="radio" name="filter-status" onchange="this.form.submit()"
                                                       id="filt1-2" value="promotion" {{request('filter-status') == 'promotion' ? 'checked' : ''}}><label
                                for="filt1-2">Promotion</label></span></li>
                </ul>
            </div>
        </div>
        <div class="widget style2 quick_filters">
            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Price Filter</h4>
            <div class="widget-data">
                <ul>
                    <li><span class="radio-box"><input type="radio" name="filter-price" onchange="this.form.submit()"
                                                       id="filt0" value="all" checked {{request('filter-price') == 'all' ? 'checked' : ''}}><label
                                for="filt0">All</label></span></li>
                    <li><span class="radio-box"><input type="radio" name="filter-price" onchange="this.form.submit()"
                                                       id="filt1" value="lt50"{{request('filter-price') == 'lt50' ? 'checked' : ''}}><label
                                for="filt1">Price < $50.00</label></span></li>
                    <li><span class="radio-box"><input type="radio" name="filter-price" onchange="this.form.submit()"
                                                       id="filt2" value="bt50n100"{{request('filter-price') == 'bt50n100' ? 'checked' : ''}}><label
                                for="filt2">Price $50.00 - $100.00</label></span></li>
                    <li><span class="radio-box"><input type="radio" name="filter-price" onchange="this.form.submit()"
                                                       id="filt3" value="gt100" {{request('filter-price') == 'gt100' ? 'checked' : ''}}><label
                                for="filt3">Price > $100.00</label></span></li>
                </ul>
            </div>
        </div>
    </div><!--Sidebar -->
    </form>
</div>
