<div class="flex_all_blog">
    @forelse ($blogs as $blog)
    <div class="col">
        <a href="{!! url('blog-detail/' . $blog->slug) !!}">
            <div class="image">
                <!-- <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"> -->
                <img src="{{ get_site_image_src('blog', !empty($blog) ? $blog->image : '') }}" alt="{!! $blog->title !!}" />
            </div>
            <h5>{{ $blog->title }}</h5>
            <div class="date">{{ $blog->created_at->format('d M, Y') }}</div>
        </a>
    </div>
    @empty
    <p style="background-color: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; border-radius: 5px; text-align: center; font-size: 16px;">
        No blogs available for this category.
    </p>

    @endforelse
</div>