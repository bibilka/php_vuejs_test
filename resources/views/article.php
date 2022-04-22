<?php include ('partials/header.php');?>
<div id="app">
  <div id="article">
    <h1>Статья<small class="text-muted">"Рыба-текст"</small></h1>
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
      <div class="col">
        <div class="card" v-for="comment in comments" :key="comment.id">
          <div class="card-body">
            <h5 class="card-title">{{ comment.title }} <small class="text-muted">({{ comment.created_at }})</small></h5>
            <p class="card-text" style="padding-bottom:1rem;">
              {{ comment.comment }}
            </p>
            <footer class="blockquote-footer">{{ comment.username }} ({{ comment.email }})</footer>
          </div>
        </div>
      </div>
      <div class="col">
      <form @submit="addComment">
        <h3>Добавить комментарий</h3>
        <div class="row">
          <div class="col form-group">
            <label for="exampleFormControlInput1">Ваше имя</label>
            <input v-model="comment.username" type="text" class="form-control" placeholder="Укажите ваше имя">
          </div>
          <div class="col form-group">
            <label for="exampleFormControlInput1">E-mail</label>
            <input v-model="comment.email" type="email" class="form-control" placeholder="Укажите ваш email-адрес">
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlInput1"><b>Заголовк</b></label>
          <input v-model="comment.title" type="text" class="form-control" placeholder="Укажите заголовок комментария">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Комментарий</label>
          <textarea v-model="comment.comment" class="form-control" rows="3"></textarea>
        </div>
        <br>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-primary w-50">Отправить</button>
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
    data: {
      comments: [],
      comment: {
        username: '',
        email: '',
        title: '',
        comment: '',
      }
    },
    methods: {
      getComments: function() {
        axios.get('/api/getComments').then(function (response) {
          app.comments = response.data.data;
        });
      },
      addComment: function(e) {
        e.preventDefault();
        axios.post('/api/addComment', this.comment).then(function (response) {
          console.log(response)
        });
      }
    },
    created: function() {
      this.getComments();
    }
  })
</script>

<?php include ('partials/footer.php');?>