<form action="{{$action}}" method="POST" enctype="multipart/form-data">

  @csrf

  <div class="field">
    <label class="label">Title</label>
    <div class="control">
      <input class="input"
             type="text"
             name="title"
             value="{{ old('title') ?? ($blogentry ? $blogentry->title : '') }}">
    </div>
    @error('title')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <label class="label">Publish at</label>
    <div class="control has-icons-left">
      <input class="input"
             type="text"
             name="publication_date"
             value="{{ old('publication_date') ?? ($blogentry ? $blogentry->publication_date : today()) }}">
      <span class="icon is-small is-left">
        <i class="fas fa-calendar"></i>
      </span>
    </div>
    @error('publication_date')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div id="header_image_input" class="file has-name is-boxed">
    <label class="file-label">
      <input class="file-input" type="file" name="image">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Choose a header image…
        </span>
      </span>
      <span class="file-name">
        {{ $blogentry ? $blogentry->header_image : 'your_image.png' }}
      </span>
    </label>
    @error('file')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <script>
    const fileInput = document.querySelector('#header_image_input input[type=file]');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#header_image_input .file-name');
        fileName.textContent = fileInput.files[0].name;
      }
    }
  </script>

  <div class="field">
    <label class="label">Content</label>
    <div class="control">
      <textarea name="content">{{ old('content') ?? ($blogentry ? $blogentry->content : '') }}</textarea>
      <script>
        async function previewRender(plainText, preview) {
          const response = await axios.post('{{route('render')}}', {
            markdown: plainText
          });
          preview.innerHTML = `<div class="box" style="border-radius:0; box-shadow: none;">${response.data}</div>`;
        }
        const simplemde = new SimpleMDE({
          previewRender: previewRender,
          toolbar: [
            'bold',
            'italic',
            'strikethrough',
            'heading',
            '|',
            'quote',
            'unordered-list',
            'ordered-list',
            '|',
            'link',
            'image',
            '|',
            'preview',
          {
            name: 'md-guide',
            action: 'https://www.markdownguide.org/basic-syntax',
            className: 'fas fa-question-circle',
            title: 'Markdown Guide'
          }]
        });
      </script>
    </div>
    @error('content')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <div class="control">
      <input class="button" type="submit" value="{{$submitText}}">
    </div>
  </div>
</form>
