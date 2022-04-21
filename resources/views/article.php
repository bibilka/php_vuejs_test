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
</div>
<script>
  var app = new Vue({
    el: "#app",
    data: {
      comments: []
    },
    methods: {
      getComments: function() {
        axios.get('/api/getComments').then(function (response) {
          console.log(response);
        });
      }
    },
    created: function() {
      this.getComments();
    }
  })
</script>

<?php include ('partials/footer.php');?>