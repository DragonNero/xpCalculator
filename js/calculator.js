const xpTable = {
  'economy': {
    'Domestic': 2,
    'Medium': 5,
    'Long 1': 8,
    'Long 2': 10,
    'Long 3': 12
  },
  'premium': {
    'Domestic': 4,
    'Medium': 10,
    'Long 1': 16,
    'Long 2': 20,
    'Long 3': 24
  },
  'business': {
    'Domestic': 6,
    'Medium': 15,
    'Long 1': 24,
    'Long 2': 30,
    'Long 3': 36
  },
  'first': {
    'Domestic': 10,
    'Medium': 25,
    'Long 1': 40,
    'Long 2': 50,
    'Long 3': 60
  }
};

$(function() {
    $.getJSON('./assets/airports.json', function(codesList) { /** If other lang needed dl from https://www.flyingblue.us/kamino/ond?lang=en&market=US */
      let airportCodes = [{id: null, text: ''}];
      $.each(codesList, function(index, code) {
        airportCodes.push({
          id: code.code,
          text: code.label
        });
      });

      $(".codeSelect").select2({
        data: airportCodes
      });

      $('#calculate').on('click', function() {
        $('#errorFeedback').text('');
        $('#feedback').text('');

        let selectedClass = $('#class').val();
        let codeList = [];
        $('.codeSelect').each(function() {
          if ($(this).val() !== '') {
            codeList.push($(this).val());
          }
        });

        if (codeList.length < 2) {
          $('#errorFeedback').text('At least 2 airports must be selected');
          return;
        }

        for (let i = 0; i < codeList.length - 1; i++) {
          if (codeList[i] === codeList[i + 1]) {
            $('#errorFeedback').text('There must not be 2 times the same airport back to back');
            return;
          }
        }

        const chunks = splitArray(codeList);

        processChunks(chunks, selectedClass);
      });

      $('#addLeg').on('click', function() {
        const newSelect = $(
          '<div class="col col-8">' +
          '<div class="input-group mb-3">' +
          '<select class="codeSelect form-control" data-placeholder="Select an airport" aria-describedby="basic-addon2"><option></option></select>' +
          '<span class="input-group-text" id="basic-addon2"><i class="bi bi-airplane-fill"></i></span>' +
          '</div>' +
          '</div>'
        );

        $('div.tripList').append(newSelect);

        // Initialize Select2 for the newly added select element
        newSelect.find('.codeSelect').select2({
          data: airportCodes
        });
      });
    });
});

function splitArray(arr, returnArray = []) {
  if (arr.length - 3 === 0 || arr.length - 2 === 0) {
    returnArray.push(arr)
    return returnArray
  }

  let chunk;
  if (arr.length - 3 >= 1) { // if there is at least 1 element remaining
    chunk = arr.splice(0, 3); // we pop out the first 3
  	returnArray.push(chunk) // we append them to the return array
    arr.unshift(chunk[chunk.length - 1]) // we add the last element of this to the remaining array
    return splitArray(arr, returnArray)
  } else if (arr.length - 2 >= 1) {
    chunk = arr.splice(0, 2);
  	returnArray.push(chunk)
    arr.unshift(chunk[chunk.length - 1])
    return splitArray(arr, returnArray)
  } else {
    // error
  }
}

async function processChunks(chunks, selectedClass) {
  let total = null;
  for (let i = 0; i < chunks.length; i++) {
    let query = {};
    if (chunks[i].length === 3) {
      query = {
        origin: chunks[i][0],
        via: chunks[i][1],
        destination: chunks[i][2]
      };
    } else {
      query = {
        origin: chunks[i][0],
        destination: chunks[i][1]
      };
    }

    try {
      const response = await makeAjaxCall(query);
      for (let j = 0; j < response.length; j++) {
        let thisXp = null;
        if (selectedClass !== '') {
          thisXp = xpTable[selectedClass][response[j]];
          total += thisXp;
        }

        $('#feedback').append('<span class="path">' + chunks[i][j] + '-' + chunks[i][j+1] + '</span> <i class="bi bi-arrow-right"></i> ' + response[j] + (thisXp !== null ? ' (+' + thisXp + ' XP)' : '') + '<br>');
      }
    } catch (error) {
      $('#errorFeedback').html("An error occurred while fetching data.");
    }
  }
  if (total !== null) {
    $('#feedback').append('<span class="total">TOTAL:<span class="totalValue">' + total + 'XP</span></span>');
  }
}

function makeAjaxCall(query) {
  return new Promise(function(resolve, reject) {
    $.ajax({
      type: 'GET',
      url: './assets/proxy.php',
      dataType: 'json',
      data: query,
      success: function(response) {
        resolve(response);
      },
      error: function(xhr, status, error) {
        reject(error);
      }
    });
  });
}

