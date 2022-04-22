<?php include ('partials/header.php');?>
<div id="app">
  <div id="article">
    <h1>Статья <small class="text-muted">"Рыба-текст"</small></h1>
    <hr>

    <p>Синтетическое тестирование требует от нас анализа стандартных подходов. Лишь ключевые особенности структуры проекта, инициированные исключительно синтетически, смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. Принимая во внимание показатели успешности, выбранный нами инновационный путь требует анализа своевременного выполнения сверхзадачи.
    </p>
    <p>Для современного мира разбавленное изрядной долей эмпатии, рациональное мышление не даёт нам иного выбора, кроме определения позиций, занимаемых участниками в отношении поставленных задач. Как уже неоднократно упомянуто, сделанные на базе интернет-аналитики выводы смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности. 
    </p>

    <br>
    <blockquote class="blockquote">
      <p class="mb-0">А ещё тщательные исследования конкурентов призывают нас к новым свершениям, которые, в свою очередь, должны быть указаны как претенденты на роль ключевых факторов. Внезапно, стремящиеся вытеснить традиционное производство, нанотехнологии могут быть описаны максимально подробно. Лишь многие известные личности, которые представляют собой яркий пример континентально-европейского типа политической культуры, будут объективно рассмотрены соответствующими инстанциями.</p>
      <br>
      <footer class="blockquote-footer">Кто-то известный из <cite title="Source Title">"Откуда-то"</cite></footer>
    </blockquote>
    <br>

    <p>Вот вам яркий пример современных тенденций - базовый вектор развития является качественно новой ступенью вывода текущих активов. Являясь всего лишь частью общей картины, стремящиеся вытеснить традиционное производство, нанотехнологии, превозмогая сложившуюся непростую экономическую ситуацию, подвергнуты целой серии независимых исследований.
    </p>
  </div>

  <br><h3>Комментарии: </h3>
  <hr>
  <div id="comments">
    <div class="row">
      <div class="col border-right">
        <div v-if="!comments.length">
          <p class="lead">Тут пока-что пусто. Добавьте первый комментарий! :)</p>
        </div>
        <div class="card" v-if="(index+1) <= commentsToShow" v-for="(comment, index) in comments" :key="comment.id">
          <div class="card-body">
            <h5 class="card-title">{{ comment.title }} <small class="text-muted">({{ comment.created_at }})</small></h5>
            <p class="card-text" style="padding-bottom:1rem;">
              {{ comment.comment }}
            </p>
            <footer class="blockquote-footer">{{ comment.username }} ({{ comment.email }})</footer>
          </div>
        </div><br>
        <button v-if="comments.length > commentsToShow" type="button" class="btn" @click="commentsToShow += 1">Показать больше</button>
        <button v-else-if="comments.length > 3" type="button" class="btn" @click="commentsToShow = 3">Скрыть</button>
      </div>
      <div class="col">
      <div v-if="hasSucces" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div v-if="hasError" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form @submit.prevent="addComment">
        <h3>Добавить комментарий</h3>
        <div class="row">
          <div class="col form-group has-validation required">
            <label class="control-label">Ваше имя</label>
            <input 
              v-validate="{ required: true, min:2, max: 100, alpha_spaces}" 
              name="username" 
              v-model="comment.username" 
              type="text" 
              class="form-control"
              v-bind:class="{ 'is-invalid': errors.has('username') }"
              placeholder="Укажите ваше имя">
            <div class="invalid-feedback">
              <ul><li v-for="error in errors.collect('username')">{{ error }}</li></ul>
            </div>
          </div>
          <div class="col form-group has-validation required">
            <label class="control-label">E-mail</label>
            <input 
              v-validate="{ required: true, email, max:50}" 
              name="email" 
              v-model="comment.email" 
              type="email" 
              class="form-control"
              v-bind:class="{ 'is-invalid': errors.has('email') }"
              placeholder="Укажите ваш email-адрес">
            <div class="invalid-feedback">
              <ul><li v-for="error in errors.collect('email')">{{ error }}</li></ul>
            </div>
          </div>
        </div>
        <br>
        <div class="form-group has-validation required">
          <label class="control-label"><b>Заголовок</b></label>
          <input 
            v-validate="{ required: true, min: 5, max: 50}" 
            name="title" 
            v-model="comment.title" 
            type="text" 
            class="form-control"
            v-bind:class="{ 'is-invalid': errors.has('title') }"
            placeholder="Укажите заголовок комментария">
          <div class="invalid-feedback">
            <ul><li v-for="error in errors.collect('title')">{{ error }}</li></ul>
          </div>
        </div>
        <div class="form-group has-validation required">
          <label class="control-label">Комментарий</label>
          <textarea 
            v-model="comment.comment"
            v-validate="{ required: true, min: 5, max: 250}" 
            name="comment"
            v-bind:class="{ 'is-invalid': errors.has('comment') }"
            class="form-control" 
            rows="5">
          </textarea>
          <div class="invalid-feedback">
            <ul><li v-for="error in errors.collect('comment')">{{ error }}</li></ul>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <button :disabled="!isFormValid" type="submit" class="btn btn-primary w-50">Отправить</button>
          </div>
        </div>
      </form>

      </div>
    </div>
  </div>

</div>
<script>
  var app = new Vue({
    el: "#app",
    data() {
      return {
        // список всех комментариев к статье
        comments: [],

        // объект для хранения промежуточных значений при добавлении нового комментария
        comment: {
          username: '',
          email: '',
          title: '',
          comment: '',
        },

        // флаги для реагирования на серверную валидацию формы
        hasSucces: false,
        hasError: false,
        message: '',

        // кол-во одновременно отображаемых комментариев
        commentsToShow: 3
      }
    },
    computed: {
      // Проверяем, что каждое поле формы валидно
      isFormValid () {
        return Object.keys(this.fields).every(field => this.fields[field].valid);
      },
    },
    methods: {

      // метод для получения списка всех комментариев и вывода их на страницу
      getComments: function() {
        axios.get('/api/getComments').then(function (response) {
          app.comments = response.data.data;
        });
      },

      // метод для добавления нового комментария
      addComment: function(e) {

        e.preventDefault();
        // сбрасываем флаги
        this.hasSucces = false
        this.hasError = false
        this.message = ''

        // выполняем запрос на локальное апи
        axios.post('/api/addComment', this.comment).then(response => {
          // добавляем новый комментарий на страницу
          this.comments.unshift(response.data.data)
          // сбрасываем форму и валидацию
          this.resetForm()
          this.hasSucces = true
          this.message = 'Комментарий добавлен!'
          this.commentsToShow = 3
        }).catch(error => {
          // обрабатываем серверные ошибки
          this.hasError = true
          this.message = 'Произошла непредвиденная ошибка. Пожалуйста, попробуйте позже.'
        })
      },

      // метод для сбрасывания формы и валидации
      resetForm: function() {
        // очищаем значения полей
        this.comment.username = ''
        this.comment.email = ''
        this.comment.title = ''
        this.comment.comment = ''

        // сбрасываем валидатор
        this.$nextTick(() => {
          this.errors.clear();
          this.$nextTick(() => {
              this.$validator.reset();
          });
        });
      },
    },

    // инициализация страницы
    created: function() {
      // подгружаем комментарии
      this.getComments();
    }
  })
</script>

<style>
		.form-group.required .control-label:after { 
			content:" *";
			color:red;
		}
</style>

<?php include ('partials/footer.php');?>