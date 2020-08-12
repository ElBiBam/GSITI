<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Radial Partition Layout</title>
  <meta name="description" content="Arrange people in rings around a central person, in layers according to distance from the central person." />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Copyright 1998-2019 by Northwoods Software Corporation. -->

  <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
  <script src="https://unpkg.com/gojs/extensions/RadialLayout.js"></script>
  

  <script id="code">
    var layerThickness = 80;  // how thick each ring should be
    function init() {
      //if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
      var $ = go.GraphObject.make;  // for conciseness in defining templates
      myDiagram =
        $(go.Diagram, "myDiagramDiv", // must be the ID or reference to div
          {
            initialAutoScale: go.Diagram.Uniform,
            isReadOnly: true,
            maxSelectionCount: 1,
            layout: $(RadialLayout, {
              maxLayers: 5,
              layerThickness: layerThickness,
              rotateNode: function(node, angle, sweep, radius) {
                // all nodes are centered at the origin
                node.location = this.arrangementOrigin;
                // because the Shape.geometry will be centered at the origin --
                // see makeAnnularWedge, below
                node.diagram.model.setDataProperty(node.data, "angle", angle);
                node.diagram.model.setDataProperty(node.data, "sweep", sweep);
                node.diagram.model.setDataProperty(node.data, "radius", radius);
              }
            }),
            "animationManager.isEnabled": false
          });
      var commonToolTip =
        $("ToolTip",
          $(go.Panel, "Vertical",
            { margin: 3 },
            $(go.TextBlock,  // bound to node data
              { margin: 4, font: "bold 12pt sans-serif" },
              new go.Binding("text")),
            $(go.TextBlock,  // bound to node data
              new go.Binding("text", "color", function(c) { return "Color: " + c; })),
            $(go.TextBlock,  // bound to Adornment because of call to Binding.ofObject
              new go.Binding("text", "", function(ad) { return "Connections: " + ad.adornedPart.linksConnected.count; }).ofObject())
          )  // end Vertical Panel
        );  // end Adornment
      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Spot",
          {
            locationSpot: go.Spot.Center,
            selectionAdorned: false,
            mouseEnter: function(e, node) { node.layerName = "Foreground"; },
            mouseLeave: function(e, node) { node.layerName = ""; },
            click: nodeClicked,
            toolTip: commonToolTip
          },
          $(go.Shape, // this always occupies the full circle
            { fill: "lightgray", strokeWidth: 0 },
            new go.Binding("geometry", "", makeAnnularWedge),
            new go.Binding("fill", "color")),
          $(go.TextBlock,
            { width: layerThickness, textAlign: "center" },
            new go.Binding("alignment", "", computeTextAlignment),
            new go.Binding("angle", "angle", ensureUpright),
            new go.Binding("text"))
        );
        
      function makeAnnularWedge(data) {
        var angle = data.angle;
        var sweep = data.sweep;
        var radius = data.radius;  // the inner radius
        if (angle === undefined || sweep === undefined || radius === undefined) return null;
        // the Geometry will be centered about (0,0)
        var outer = radius + layerThickness;  // the outer radius
        var inner = radius;
        var p = new go.Point(outer, 0).rotate(angle - sweep / 2);
        var q = new go.Point(inner, 0).rotate(angle + sweep / 2);
        var geo = new go.Geometry()
          .add(new go.PathFigure(-outer, -outer))  // always make sure the Geometry includes the top left corner
          .add(new go.PathFigure(outer, outer))    // and the bottom right corner of the whole circular area
          .add(new go.PathFigure(p.x, p.y)  // start at outer corner, go clockwise
            .add(new go.PathSegment(go.PathSegment.Arc, angle - sweep / 2, sweep, 0, 0, outer, outer))
            .add(new go.PathSegment(go.PathSegment.Line, q.x, q.y))  // to opposite inner corner, then anticlockwise
            .add(new go.PathSegment(go.PathSegment.Arc, angle + sweep / 2, -sweep, 0, 0, inner, inner).close()));
        return geo;
      }
      function computeTextAlignment(data) {
        var angle = data.angle;
        var radius = data.radius;
        if (angle === undefined || radius === undefined) return go.Spot.Center;
        var p = new go.Point(radius + layerThickness / 2, 0).rotate(angle);
        return new go.Spot(0.5, 0.5, p.x, p.y);
      }
      function ensureUpright(angle) {
        if (angle > 90 && angle < 270) return angle + 180;
        return angle;
      }
      // this is the root node, at the center of the circular layers
      myDiagram.nodeTemplateMap.add("Root",
        $(go.Node, "Auto",
          {
            locationSpot: go.Spot.Center,
            selectionAdorned: false,
            toolTip: commonToolTip,
            width: layerThickness * 2,
            height: layerThickness * 2
          },
          $(go.Shape, "Circle",
            { fill: "white", strokeWidth: 0.5, spot1: go.Spot.TopLeft, spot2: go.Spot.BottomRight }),
          $(go.TextBlock,
            { font: "bold 18pt sans-serif", textAlign: "center" },
            new go.Binding("text")),        
        ));
      // define the Link template -- don't show anything!
      myDiagram.linkTemplate =
        $(go.Link);
      generateGraph();
    }
    function generateGraph() {

      var nodeDataArray = [];

      var linkDataArray = [];

      //var sum = 0;
      <?php $sum = 0; $i = 0; ?>
        nodeDataArray.push({key: '<?php echo "2019"; ?>', text: '<?php echo "2019"; ?>'
        , color: go.Brush.randomColor(128, 240)});
        nodeDataArray.push({key: '<?php echo "2019Bienes"; ?>', text: '<?php echo "Bienes"; ?>'
        , color: go.Brush.randomColor(128, 240)});
        nodeDataArray.push({key: '<?php echo "2018"; ?>', text: '<?php echo "2018"; ?>'
        , color: go.Brush.randomColor(128, 240)});
        nodeDataArray.push({key: '<?php echo "2018Bienes"; ?>', text: '<?php echo "Bienes"; ?>'
        , color: go.Brush.randomColor(128, 240)});
        linkDataArray.push({ from: '<?php echo "2019"; ?>', to: '<?php echo "2019Bienes"; ?>', color: go.Brush.randomColor(0, 127) });              
        linkDataArray.push({ from: '<?php echo "2018"; ?>', to: '<?php echo "2018Bienes"; ?>', color: go.Brush.randomColor(0, 127) });
        
        <?php $i = 0; foreach ($voucherHeaders as $voucherHeader):
            $year = $voucherHeader->issue_date->year;
            ?>
              
              
            <?php 
            foreach ($voucherHeader->voucher_details as $voucherDetail):
              $sum = $voucherDetail['price'];
              $product = $voucherDetail->product;
              $product_type = $product->product_type->name;
              ?>
              nodeDataArray.push({key: '<?php echo $year."Bienes".$i; ?>', text: '<?php echo "S/.".$sum; ?>'
              , color: go.Brush.randomColor(128, 240)});

              linkDataArray.push({ from: '<?php echo $year."Bienes"; ?>', to: '<?php echo $year."Bienes".$i; ?>', color: go.Brush.randomColor(0, 127) });
              
            <?php $i = $i + 1; endforeach; ?>
            
            
      <?php endforeach; ?>

      console.log(nodeDataArray);
      console.log(linkDataArray);
      /*
      nodeDataArray.push({key: '<?php echo $year; ?>', text: '<?php echo $year; ?>'
        , color: go.Brush.randomColor(128, 240)});
      nodeDataArray.push({key: '<?php echo "Bienes"; ?>', text: '<?php echo "Bienes"; ?>'
      , color: go.Brush.randomColor(128, 240)});
      nodeDataArray.push({key: '<?php echo "sum"; ?>', text: '<?php echo $sum; ?>'
      , color: go.Brush.randomColor(128, 240)}); 
      linkDataArray.push({ from: '<?php echo $year; ?>', to: '<?php echo "Bienes"; ?>', color: go.Brush.randomColor(0, 127) });
      linkDataArray.push({ from: '<?php echo "Bienes"; ?>', to: '<?php echo "sum"; ?>', color: go.Brush.randomColor(0, 127) });
      */
      /*
      Array.prototype.sum = function (prop) {
          var total = 0
          for ( var i = 0, _len = this.length; i < _len; i++ ) {
              total += this[i][prop]
          }
          return total
      }
      nodeDataArray = nodeDataArray.sum("price");*/
      myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
      // layout based on a random person
      var someone = nodeDataArray[Math.floor(Math.random() * nodeDataArray.length)];
      var somenode = myDiagram.findNodeForData(someone);
      nodeClicked(null, somenode);
    }

    function nodeClicked(e, root) {
      var diagram = root.diagram;
      if (diagram === null) return;
      // all other nodes should be visible and use the default category
      diagram.nodes.each(function(n) {
        n.visible = true;
        if (n !== root) n.category = "";
      })
      // make this Node the root
      root.category = "Root";
      // the root node always gets a full circle for itself, just in case the "Root"
      // template has any bindings using these properties
      diagram.model.setDataProperty(root.data, "angle", 0);
      diagram.model.setDataProperty(root.data, "sweep", 360);
      diagram.model.setDataProperty(root.data, "radius", 0);
      // tell the RadialLayout what the root node should be
      // setting this property will automatically invalidate the layout and then perform it again
      diagram.layout.root = root;
    }
  </script>
</head>
<body onload="init()">
<div id="sample">
  <div id="myDiagramDiv" style="border: solid 1px black; background: white; width: 100%; height: 600px"></div>
  
</div>

</body>
</html>