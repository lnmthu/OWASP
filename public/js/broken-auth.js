window.addEventListener('load', function() {
    var terminalContainer = document.getElementById('terminal-container');
    var term = new Terminal({ cursorBlink: true });
    term.open(terminalContainer);
    term.fit();

    var socket = io.connect();
    socket.on('connect', function() {
      term.write('\r\n*** Connected to backend***\r\n');

      // Browser -> Backend
      term.on('data', function(data) {
        socket.emit('data', data);
      });

      // Backend -> Browser
      socket.on('data', function(data) {
        term.write(data);
      });

      socket.on('disconnect', function() {
        term.write('\r\n*** Disconnected from backend***\r\n');
      });
    });
  }, false);