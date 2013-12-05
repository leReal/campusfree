ght           CDATA     "100">

<!--  HTTP listeners for a lb-server

      This element is used to specify HTTP/HTTPS listeners for an lb-server. 
      An server could have one or more listeners configured. When the load  
      balancer forwards requests to an server, it selects a listener from the
      list of configured listeners for the server.

      id              Unique identifier for http listener.

      address 	      IP address for the listener.

      port    	      Port number for the listener. 

      security-enabled 
                      An optional boolean attribute that determines whether the 
                      http listener runs SSL. The default is false.
-->

<!ELEMENT lb-http-listener EMPTY>
<!ATTLIST lb-http-listener    id                     CDATA  #REQUIRED
                              address                CDATA  #REQUIRED
                              port                   CDATA  #REQUIRED
                              security-enabled       %boolean; "false"> 

<!ELEMENT lb-j2ee-applications (lb-j2ee-application*)>

<!--  Deployed LB J2EE Applications.

      This element is the counterpart of an "j2ee-application" from domain.xml 
      for the load balancer. The attributes that apply to an j2ee-application 
      specific to the load balancer are specified in this section. The 
      lb-j2ee-application is an aggregation of context-roots and an 
      j2ee-application level implicit health checker.

      NOTE: The j2ee-application level health checker allows health checks to
      be performed on a per application basis. So instead of marking an entire
      instance unhealthy, as is the case in the default lb-group level health
      checker, a j2ee-application level health checker can mark an instance
      healthy or unhealthy in the context of a particular application. This
      allows an instance to be marked unhealthy for some applications while 
      being marked as healthy for other applications.

      name	      identifies the lb-j2ee-application

      enabled	      signifies whether the lb-j2ee-application is enabled or
         	      disabled. Default value would be "true".

      disable-timeout-in-minutes   
                      specifies the quiescing timeout interval after which no 
                      further requests would be sent to the lb-j2ee-application
                      that has been disabled. Application is  identified by the 
                      lb-j2ee-application context root as specified in 
                      applicaiton-web-module element. Default value would be 31
                      minutes (i.e. more than the default session idle timeout 
                      which is 30 minutes).
-->

<!ELEMENT lb-j2ee-application (j2ee-application-web-module*, health-checker?)>
<!ATTLIST lb-j2ee-application  name CDATA #REQUIRED
                               enabled         %boolean; "true"
                               disable-timeout-in-minutes CDATA     "31"> 

<!--  Web Modules in the deployed j2ee-application.

      This element is used to specify web-modules that are part of a 
      lb-j2ee-application. An j2ee-application could have one or more 
      web-modules. The j2ee-application-web-module element is an aggregation of 
      idempotent-url-patterns and a health-checker.

      NOTE: The j2ee-application-web-module level health checker overrides the
      health checker specified at the lb-j2ee-application level. 
    
      name	              identifies the j2ee-application-web-module

      lb-context-root         context root of the j2ee-application deployed

-->

<!ELEMENT j2ee-application-web-module (idempotent-url-pattern*, web-module-response-timeout?, urls-and-response-timeouts?, health-checker?, error-url?)>
<!ATTLIST j2ee-application-web-module name CDATA #REQUIRED
                                      lb-context-root CDATA     #REQUIRED>

<!--  Idempotent URLs for the deployed Web Module.

      This element is used to specify all idempotent-url-patterns for a 
      web-module that is part of an lb-j2ee-application as well as for a 
      stand-alone lb-web-module. What this implies is that when a load balancer
      detects that an instance is unhealthy while servicing a request, it would 
      implicitly retry the request on another server in the lb-group, if its URL
      matches one of the idempotent-url-patterns for that j2ee-application.
    
      url-pattern       URL patterns that are idempotent that can be retried by 
                        the load balancer, if a request containing the pattern
                        fails due to an instance being unhealthy.
    
      no-of-retries     Number of times the URL should be retried. The default 
                        value is equal to the number of servers that support the
                        the context-root for the url-pattern, minus 1. 

-->

<!ELEMENT idempotent-url-pattern EMPTY>
<!ATTLIST idempotent-url-pattern   url-pattern             CDATA     #REQUIRED
                                   no-of-retries           CDATA     "-1">

<!--  Web Module Response Timeouts

      This element is used to specify all timeouts at a Web Module level.
      This includes standalone web-modules and web-modules that are part of 
      an lb-j2ee-application. This setting overrides the LB wide response 
      timeout for the web-module.
    
      timeout-in-seconds        
                     timeout interval in seconds within which response should 
                     be obtained for a request load balanced; else 