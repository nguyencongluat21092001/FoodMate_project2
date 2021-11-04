<div class="col-md-3 col-sm-12 col-lg-3">
    <div class="sidebar left">
        <div class="widget style2 Search_filters">
            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Search
                Filters</h4>
            <div class="widget-data">
                <ul>
                    @foreach($categories as $category)
                        <li><a href="restaurants/{{$category->id}}" title=""
                               itemprop="url"
                               style="text-transform: capitalize">{{$category->cate_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
