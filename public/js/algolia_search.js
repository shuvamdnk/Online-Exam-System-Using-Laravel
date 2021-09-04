const client = algoliasearch('NV7K26PSHS', '135c04b20cf7f81235a45afd3b102f06');
const student_name = client.initIndex('student_name');
const roll_number = client.initIndex('roll_number');
autocomplete('#search-all', {}, [
    {
      source: autocomplete.sources.hits(student_name, { hitsPerPage: 3 }),
      displayKey: 'student_name',
      templates: {
        header: '<div class="aa-suggestions-category">Students</div>',
        suggestion({_highlightResult}) {
          return `<span id='s_name'>${_highlightResult.student_name.value}`;
        }
      }
    },
]);

// </span><span id='s_roll'>${_highlightResult.roll_number.value}</span>

