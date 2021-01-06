<html>
<head>
    <meta charset="UTF-8">
    <title>Web-based raw printing example</title>
</head>
<body>
<h1>Web-based raw printing example</h1>

<p>This snippet forwards raw data to a local websocket.</p>

<form>
    <input type="button" onclick="directPrintBytes(printSocket, [0x1b, 0x40, 0x48, 0x65, 0x6c, 0x6c, 0x6f, 0x20, 0x77, 0x6f, 0x72, 0x6c, 0x64, 0x0a, 0x1d, 0x56, 0x41, 0x03]);" value="Print test string"/>
    <input type="button" onclick="directPrintFile(printSocket, 'receipt-with-logo.bin');" value="Load and print 'receipt-with-logo'" />
</form>

<script type="text/javascript">
    /**
     * Retrieve binary data via XMLHttpRequest and print it.
     */
    function directPrintFile(socket, path) {
        // Get binary data
        var req = new XMLHttpRequest();
        req.open("GET", path, true);
        req.responseType = "arraybuffer";
        console.log("directPrintFile(): Making request for binary file");
        req.onload = function (oEvent) {
            console.log("directPrintFile(): Response received");
            var arrayBuffer = req.response; // Note: not req.responseText
            if (arrayBuffer) {
                var result = directPrint(socket, arrayBuffer);
                if(!result) {
                    alert('Failed, check the console for more info.');
                }
            }
        };
        req.send(null);
    }

    /**
     * Extract binary data from a byte array print it.
     */
    function directPrintBytes(socket, bytes) {
        var result = directPrint(socket, new Uint8Array(bytes).buffer);
        if(!result) {
            alert('Failed, check the console for more info.');
        }
    }

    /**
     * Send ArrayBuffer of binary data.
     */
    function directPrint(socket, printData) {
        // Type check
        if (!(printData instanceof ArrayBuffer)) {
            console.log("directPrint(): Argument type must be ArrayBuffer.")
            return false;
        }
        if(printSocket.readyState !== printSocket.OPEN) {
            console.log("directPrint(): Socket is not open!");
            return false;
        }
        // Serialise, send.
        console.log("Sending " + printData.byteLength + " bytes of print data.");
        printSocket.send(printData);
        return true;
    }

    /**
     * Connect to print server on startup.
     */
    var printSocket = new WebSocket("ws://localhost:8000", ["binary"]);
    printSocket.binaryType = 'arraybuffer';
    printSocket.onopen = function (event) {
        console.log("Socket is connected.");
    }
    printSocket.onerror = function(event) {
        console.log('Socket error', event);
    };
    printSocket.onclose = function(event) {
        console.log('Socket is closed');
    }
</script>
</body>
</html>
