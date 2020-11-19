# Create a new project with this repository

* Create a new workspace into Virtualmin with the project name
  * Enabled features: 
    * Setup DNS zone
    * Setup website for domain
    * Setup ssl website too
* Ensure you are in the **www-data** group:
  * <code>groups</code>
  * If you are you should see it on the list.
  * If you are not in that group:
    * <code>sudo usermod -a -G www-data [username]</code>
    * Change [username] with your linux username
    * Validate running the check again.
    * Will need to close an reopen the terminal to get the change to apply. may be needed to logout of the desktop to apply the change.
* Open a terminal
  * <code>cd domains/<project>.<developer>.ws.serfe.com/public_html</code>
    * replace _<developer>_ with your username
    * replace _<project>_ with the project name
  * <code>git clone git@git.serfe.com:serferepo/????????????????????.git .</code>
    * The last point in the previous line is important!
  * <code>git checkout development</code>
  * Copy the _.env.sample_ file to _.env_ 
   * Modify the _.env_ file values accordingly
     - Make sure that the *PUBLIC_URL* correspond with <project>.<developer>.ws.serfe.com **(cannot be localhost)**
  * Copy the file _webroot/auth.json.sample_ to _webroot/auth.json_
  * Modify the following files to ensure they have the project information:
    - webroot/composer.json
    - webroot/auth.json
      - Make sure to include the Magento Keys provided by the client to be able to clone everything from the Magento repository.
    - .env.sample
      - Make sure to include the Magento Keys provided by the client to be able to clone everything from the Magento repository.
  * <code>docker-compose up</code>
    * database may fail the first time, just restart again
    * It may also give issues with permissions on this instance until its restarted.
  * In another console:
    * <code>./commands/post-install.sh</code>