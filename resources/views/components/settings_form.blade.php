<form action="{{route('update_settings')}}" method="POST" enctype="multipart/form-data">

  @csrf

  <div class="field">
    <label class="label">Website Title</label>
    <div class="control">
      <input class="input"
             type="text"
             name="website_title"
             value="{{ old('website_title') ?? frenchpress_setting('website_title') }}">
    </div>
    @error('website_title')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div id="logo_input" class="file has-name is-boxed">
    <label class="file-label">
      <input class="file-input" type="file" name="logo">
      <span class="file-cta">
        <span class="file-icon">
          <i class="fas fa-upload"></i>
        </span>
        <span class="file-label">
          Upload a custom logo
        </span>
      </span>
      <span class="file-name">
        {{ frenchpress_setting('logo_path') }}
      </span>
    </label>
    @error('logo')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <script>
    const fileInput = document.querySelector('#logo_input input[type=file]');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#logo_input .file-name');
        fileName.textContent = fileInput.files[0].name;
      }
    }
  </script>

  <div class="field">
    <label class="label">
      <input type="checkbox" name="allowHTML" @if(frenchpress_setting('allowHTML') === 'allow') checked @endif>
      Allow HTML in Markdown
    </label>
    @error('allowHTML')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <label class="label">
      <input type="checkbox" name="allowUnsafeLinks" @if(frenchpress_setting('allowUnsafeLinks') === 'true') checked @endif>
      Allow Javascript and Data Links in Markdown
    </label>
    @error('allowUnsafeLinks')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <label class="label">Impressum</label>
    <div class="control">
      <textarea name="impressum" id="impressum">{{ old('impressum') ?? frenchpress_setting('impressum') }}</textarea>
      <script>
        async function previewRender(plainText, preview) {
          const response = await axios.post('{{route('render')}}', {
            markdown: plainText
          });
          preview.innerHTML = response.data;
        }
        const simplemde_impressum = new SimpleMDE({
          element: document.getElementById('impressum'),
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
    @error('impressum')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <label class="label">About Me</label>
    <div class="control">
      <textarea name="about_me" id="about_me">{{ old('about_me') ?? frenchpress_setting('about_me') }}</textarea>
      <script>
        async function previewRender(plainText, preview) {
          const response = await axios.post('{{route('render')}}', {
            markdown: plainText
          });
          preview.innerHTML = response.data;
        }
        const simplemde_about_me = new SimpleMDE({
          element: document.getElementById('about_me'),
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
    @error('about_me')
    <p class="help is-danger">
      {{$message}}
    </p>
    @enderror
  </div>

  <div class="field">
    <div class="control">
      <input class="button" type="submit" value="Save changes">
    </div>
  </div>
</form>
