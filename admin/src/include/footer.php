        
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
        	Designed and developed by Me
        </p>
    </div>
    
        <!-- BEGIN: load jquery -->
    <script src="src/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="src/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="src/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="src/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="src/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="src/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->

    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="src/js/jqPlot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="src/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script type="text/javascript" src="src/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script type="text/javascript" src="src/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script type="text/javascript" src="src/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script type="text/javascript" src="src/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="src/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
</body>
</html>
