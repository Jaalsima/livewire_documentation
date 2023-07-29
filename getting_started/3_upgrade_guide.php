<?php 
include('../includes/header.php');
?>
    <h2>Livewire 3 todavía está en beta</h2>
    <p>Aunque intentamos mantener los cambios que rompen la compatibilidad al mínimo, todavía son posibles mientras Livewire 3 siga en beta. Por lo tanto, recomendamos probar tu aplicación a fondo antes de utilizar Livewire 3 en producción.</p>

    <h2>Herramienta de actualización automatizada</h2>
    <p>Para ahorrarte tiempo en la actualización, hemos incluido un comando de Artisan para automatizar la mayor parte del proceso de actualización.</p>

    <p>Después de instalar la versión 3 de Livewire, ejecuta el siguiente comando y recibirás indicaciones para actualizar automáticamente cada cambio que rompe la compatibilidad:</p>

    <pre><code class="bash">php artisan livewire:upgrade</code></pre>

    <p>Aunque el comando anterior puede actualizar gran parte de tu aplicación, la única forma de asegurarse de una actualización completa es seguir la guía paso a paso en esta página.</p>

    <h2>Contrátanos para actualizar tu aplicación</h2>
    <p>Si tienes una aplicación de Livewire grande o simplemente no deseas ocuparte de actualizar de la versión 2 a la versión 3, puedes contratarnos para que nos encarguemos de ello por ti. Obtén más información sobre nuestro servicio de actualización aquí.</p>

    <h2>Actualizar PHP</h2>
    <p>Ahora Livewire requiere que tu aplicación se ejecute en PHP versión 8.1 o superior.</p>

    <h2>Actualizar a Livewire versión 3</h2>
    <p>Ejecuta el siguiente comando de Composer para actualizar la dependencia de Livewire de tu aplicación de la versión 2 a la versión 3:</p>

    <pre><code class="bash">composer require livewire/livewire:3.0.0-beta.1</code></pre>

    <p>El comando anterior te bloqueará a la versión beta actual. Si deseas recibir actualizaciones más frecuentes, puedes cambiar a una restricción de versión más flexible:</p>

    <pre><code class="bash">composer require livewire/livewire:^3.0@beta</code></pre>

    <p>Compatibilidad de paquetes de Livewire 3</p>
    <p>La mayoría de los principales paquetes de terceros para Livewire ya admiten Livewire 3 o están trabajando en darle soporte pronto. Sin embargo, inevitablemente habrá paquetes que tardarán más en ofrecer soporte para Livewire 3.</p>

    <h2>Borrar la caché de vistas</h2>
    <p>Ejecuta el siguiente comando de Artisan desde el directorio raíz de tu aplicación para borrar cualquier vista Blade en caché/compilada y forzar a Livewire a volver a compilarlas para que sean compatibles con Livewire 3:</p>

    <pre><code class="bash">php artisan view:clear</code></pre>

    <h2>Combinar nueva configuración</h2>
    <p>Livewire 3 ha cambiado varias opciones de configuración. Si tu aplicación tiene un archivo de configuración publicado (config/livewire.php), deberás actualizarlo para tener en cuenta los siguientes cambios.</p>

    <h3>Nueva configuración</h3>
    <p>Se han introducido las siguientes claves de configuración en la versión 3:</p>

    <pre><code class="php">'legacy_model_binding' => false,
 
'inject_assets' => true,
 
'inject_morph_markers' => true,
 
'navigate' => false,</code></pre>

    <p>Puedes consultar el nuevo archivo de configuración de Livewire en GitHub para obtener descripciones adicionales de opciones y código copiable.</p>

    <h3>Configuración cambiada</h3>
    <p>Se han actualizado los siguientes elementos de configuración con nuevos valores predeterminados:</p>

    <pre><code class="php">'class_namespace' => 'App\\Http\\Livewire', 
'class_namespace' => 'App\\Livewire',</code></pre>

    <h3>Ruta de vista de diseño nueva</h3>
    <p>Cuando renderizas componentes de página completa en la versión 2, Livewire usaba resources/views/layouts/app.blade.php como la plantilla de diseño predeterminada.</p>

    <p>Debido a una creciente preferencia de la comunidad por los componentes Blade anónimos, Livewire 3 ha cambiado la ubicación predeterminada a: resources/views/components/layouts/app.blade.php.</p>

    <pre><code class="php">'layout' => 'layouts.app', 
'layout' => 'components.layouts.app',</code></pre>

    <h3>Configuración eliminada</h3>
    <p>Livewire ya no reconoce los siguientes elementos de configuración.</p>

    <p>app_url</p>
    <p>Si tu aplicación se sirve bajo una URI que no es raíz, en Livewire 2 podías usar la opción de configuración app_url para configurar la URL que Livewire usa para realizar solicitudes AJAX.</p>

    <p>En este caso, encontramos que una configuración de cadena era demasiado rígida. Por lo tanto, en Livewire 3 se ha optado por usar la configuración en tiempo de ejecución. Puedes consultar nuestra documentación sobre cómo configurar el punto final de actualización de Livewire para obtener más información.</p>

    <p>asset_url</p>
    <p>En Livewire 2, si tu aplicación se servía bajo una URI que no era raíz, podías usar la opción de configuración asset_url para configurar la URL base que Livewire utiliza para servir sus activos de JavaScript.</p>

    <p>Livewire 3 ha optado por una estrategia de configuración en tiempo de ejecución. Puedes consultar nuestra documentación sobre cómo configurar el punto final de activos de script de Livewire para obtener más información.</p>

    <p>middleware_group</p>
    <p>Debido a que Livewire ahora expone una forma más flexible de personalizar su punto final de actualización, se ha eliminado la opción de configuración middleware_group.</p>

    <p>Puedes consultar nuestra documentación sobre cómo personalizar el punto final de actualización de Livewire para obtener más información sobre cómo aplicar middleware personalizado a las solicitudes de Livewire.</p>

    <p>manifest_path</p>
    <p>Livewire 3 ya no usa un archivo de manifiesto para la carga automática de componentes. Por lo tanto, la opción de configuración manifest_path ya no es necesaria.</p>

    <p>back_button_cache</p>
    <p>Debido a que Livewire 3 ahora ofrece una experiencia de SPA para tu aplicación mediante wire:navigate, la opción de configuración back_button_cache ya no es necesaria.</p>

    <p>Namespace de aplicación de Livewire</p>
    <p>En la versión 2, los componentes de Livewire se generaban y reconocían automáticamente bajo el namespace App\Http\Livewire.</p>

    <p>Livewire 3 ha cambiado esta configuración predeterminada a: App\Livewire.</p>

    <p>Puedes mover todos tus componentes a la nueva ubicación o agregar la siguiente configuración en el archivo de configuración config/livewire.php de tu aplicación:</p>

    <pre><code class="php">'class_namespace' => 'App\\Http\\Livewire',</code></pre>

    <h3>Vista de diseño del componente de página</h3>
    <p>Cuando renderizas componentes de Livewire como páginas completas usando una sintaxis como la siguiente:</p>

    <pre><code class="php">Route::get('/posts', ShowPosts::class);</code></pre>

    <p>El archivo de diseño Blade utilizado por Livewire para renderizar el componente ha cambiado de resources/views/layouts/app.blade.php a resources/views/components/layouts/app.blade.php:</p>

    <pre><code class="php">resources/views/layouts/app.blade.php 
resources/views/components/layouts/app.blade.php</code></pre>

    <p>Puedes mover tu archivo de diseño a la nueva ubicación o aplicar la siguiente configuración dentro del archivo de configuración config/livewire.php de tu aplicación:</p>

    <pre><code class="php">'layout' => 'layouts.app',</code></pre>

    <p>Para obtener más información, consulta la documentación sobre cómo crear y usar un diseño de componente de página.</p>

    <h3>Vinculación de modelo Eloquent</h3>
    <p>Livewire 2 admitía la vinculación wire:model directamente a propiedades de modelos Eloquent. Por ejemplo, el siguiente era un patrón común:</p>

    <pre><code class="php">public Post $post;
 
protected $rules = [
    'post.title' => 'required',
    'post.description' => 'required',
];
<input wire:model="post.title">
<input wire:model="post.description"></code></pre>

    <p>En Livewire 3, se ha desactivado la vinculación directa a modelos Eloquent a favor de usar propiedades individuales o extraer objetos de formulario (Form Objects).</p>

    <p>Sin embargo, debido a que este comportamiento es muy utilizado en aplicaciones de Livewire, la versión 3 mantiene el soporte para este comportamiento a través de una opción de configuración en config/livewire.php:</p>

    <pre><code class="php">'legacy_model_binding' => true,</code></pre>

    <p>Al establecer legacy_model_binding en true, Livewire manejará las propiedades de modelos Eloquent exactamente como lo hacía en la versión 2.</p>

    <h3>AlpineJS</h3>
    <p>Livewire 3 se envía con AlpineJS de forma predeterminada.</p>

    <p>Si incluyes manualmente Alpine en tu aplicación de Livewire, deberás eliminarlo para que la versión interna de Alpine de Livewire no entre en conflicto.</p>

    <h4>Incluir Alpine mediante una etiqueta de script</h4>
    <p>Si incluyes Alpine en tu aplicación mediante una etiqueta de script como la siguiente, puedes eliminarlo por completo y Livewire cargará su versión interna en su lugar:</p>

    <pre><code class="html">&lt;script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"&gt;&lt;/script&gt;</code></pre>

    <h4>Incluir complementos mediante una etiqueta de script</h4>
    <p>Livewire 3 ya se envía con los siguientes complementos de Alpine:</p>

    <ul>
        <li>Collapse</li>
        <li>Focus</li>
        <li>Intersect</li>
        <li>Mask</li>
        <li>Morph</li>
        <li>Persist</li>
    </ul>

    <p>Si ya has incluido alguno de estos en tu aplicación mediante etiquetas &lt;script&gt; como se muestra a continuación, puedes eliminarlos junto con el núcleo de Alpine:</p>

    <pre><code class="html">&lt;script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"&gt;&lt;/script&gt;
<!-- ... --></code></pre>

    <h4>Acceder al objeto global de Alpine mediante una etiqueta de script</h4>
    <p>Si actualmente accedes al objeto global de Alpine desde una etiqueta de script de la siguiente manera:</p>

    <pre><code class="html">&lt;script&gt;
    document.addEventListener('alpine:init', () => {
        Alpine.data(...)
    })
&lt;/script&gt;</code></pre>

    <p>Todavía puedes hacerlo, ya que Livewire incluye e registra internamente el objeto global de Alpine como antes.</p>

    <h4>Inclusión mediante paquete JS</h4>
    <p>Si has incluido Alpine y alguno de los complementos relevantes mediante NPM en el paquete JavaScript de tu aplicación de la siguiente manera:</p>

    <pre><code class="javascript">// Advertencia: este es un fragmento del enfoque de Livewire 2 para incluir Alpine
 
import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
 
Alpine.plugin(intersect)
 
Alpine.start()</code></pre>

    <p>Puedes eliminarlos por completo porque Livewire incluye por defecto Alpine y muchos complementos populares de Alpine.</p>

    <h4>"Livewire V3 (beta) con Laravel Breeze o Laravel Jetstream"</h4>
    <p>Si estás probando Livewire V3 beta con Laravel Breeze o Laravel JetStream, deberás desactivar Alpine como se muestra arriba. Además, puedes eliminar Alpine y cualquier otro complemento de Alpine de las dependencias de tu paquete NPM. Laravel Breeze y Laravel JetStream no están listos para Livewire V3 de forma predeterminada.</p>

    <h4>Acceso a Alpine mediante paquete JS</h4>
    <p>Si estás registrando complementos o componentes personalizados de Alpine dentro del paquete JavaScript de tu aplicación de la siguiente manera:</p>

    <pre><code class="javascript">// Advertencia: este es un fragmento del enfoque de Livewire 2 para incluir Alpine
 
import Alpine from 'alpinejs'
import customPlugin from './plugins/custom-plugin'
 
Alpine.plugin(customPlugin)
 
Alpine.start()</code></pre>

    <p>Todavía puedes lograr esto importando el módulo ESM principal de Livewire en tu paquete y accediendo a Alpine desde allí.</p>

    <p>Para importar Livewire en tu paquete, primero debes deshabilitar la inyección normal de JavaScript de Livewire y proporcionar la configuración necesaria a Livewire reemplazando @livewireScripts con @livewireScriptConfig en el diseño principal de tu aplicación:</p>

    <pre><code class="html"><!-- ... -->
 
    @livewireScripts 
    @livewireScriptConfig 
</body></code></pre>

    <p>Ahora puedes importar Alpine y Livewire en el paquete de tu aplicación de la siguiente manera:</p>

    <pre><code class="javascript">import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import customPlugin from './plugins/custom-plugin'
 
Alpine.plugin(customPlugin)
 
Livewire.start()</code></pre>

    <p>Observa que ya no es necesario llamar a Alpine.start(). Livewire iniciará Alpine automáticamente.</p>

    <p>Para obtener más información, consulta nuestra documentación sobre cómo agrupar manualmente el JavaScript de Livewire.</p>

    <h3>wire:model</h3>
    <p>En Livewire 3, wire:model es "diferido" de forma predeterminada (en lugar de wire:model.defer). Para lograr el mismo comportamiento que wire:model en Livewire 2, debes usar wire:model.live.</p>

    <p>A continuación se muestra una lista de las sustituciones necesarias que deberás realizar en tus plantillas para mantener el comportamiento consistente de tu aplicación:</p>

    <pre><code class="html"><input wire:model="..."> 
<input wire:model.live="..."> 
 
<input wire:model.defer="..."> 
<input wire:model="..."> 
 
<input wire:model.lazy="..."> 
<input wire:model.blur="..."></code></pre>

    <h3>@entangle</h3>
    <p>Al igual que los cambios en wire:model, Livewire 3 difiere todas las vinculaciones de datos de forma predeterminada. Para igualar este comportamiento, también se ha actualizado @entangle.</p>

    <p>Para mantener el funcionamiento esperado de tu aplicación, realiza las siguientes sustituciones de @entangle:</p>

    <pre><code class="html">@entangle(...) 
@entangle(...).live 
 
@entangle(...).defer 
@entangle(...)</code></pre>

    <h3>Eventos</h3>
    <p>En Livewire 2, Livewire tenía dos métodos PHP diferentes para desencadenar eventos:</p>

    <pre><code class="php">emit()
dispatchBrowserEvent()</code></pre>

    <p>Livewire 3 ha unificado estos dos métodos en un solo método:</p>

    <pre><code class="php">dispatch()</code></pre>

    <p>Aquí tienes un ejemplo básico de cómo desencadenar y escuchar un evento en Livewire 3:</p>

    <pre><code class="php">// Desencadenando...
class CreatePost extends Component
{
    public Post $post;
 
    public function save()
    {
        $this->dispatch('post-created', postId: $this->post->id);
    }
}
 
// Escuchando...
class Dashboard extends Component
{
    #[On('post-created')]
    public function postAdded($postId)
    {
        //
    }
}</code></pre>

    <p>Los tres cambios principales de Livewire 2 son:</p>

    <ul>
        <li>emit() se ha renombrado a dispatch()</li>
        <li>dispatchBrowserEvent() se ha renombrado a dispatch()</li>
        <li>Todos los parámetros de evento deben tener nombre</li>
    </ul>

    <p>Para obtener más información, consulta la nueva página de documentación sobre eventos.</p>

    <p>A continuación se muestran las diferencias de "buscar y reemplazar" que debes aplicar en tu aplicación:</p>

    <pre><code class="php">$this->emit('post-created'); 
$this->dispatch('post-created'); 
 
$this->emitTo('foo', 'post-created'); 
$this->dispatch('post-created')->to('foo'); 
 
$this->emitSelf('post-created'); 
$this->dispatch('post-created')->self(); 
 
$this->emit('post-created', $post->id); 
$this->dispatch('post-created', postId: $post->id); 
 
$this->dispatchBrowserEvent('post-created'); 
$this->dispatch('post-created'); 
 
$this->dispatchBrowserEvent('post-created', ['postId' => $post->id]); 
$this->dispatch('post-created', postId: $post->id); 
<button wire:click="$emit('post-created')">...</button> 
<button wire:click="$dispatch('post-created')">...</button> 
 
<button wire:click="$emit('post-created', 1)">...</button> 
<button wire:click="$dispatch('post-created', { postId: 1 })">...</button> 
 
<button x-on:click="$wire.emit('post-created', 1)">...</button> 
<button x-on:click="$dispatch('post-created', { postId: 1 })">...</button></code></pre>

    <h3>emitUp()</h3>
    <p>El concepto de emitUp se ha eliminado por completo. Ahora, los eventos se envían mediante eventos del navegador y, por lo tanto, "burbujearán" automáticamente por defecto.</p>

    <p>Puedes eliminar cualquier instancia de $this->emitUp(...) o $emitUp(...) de tus componentes.</p>

    <h3>Pruebas de eventos</h3>
    <p>Las aserciones de eventos de Livewire también han cambiado para coincidir con la nueva terminología unificada respecto al envío de eventos:</p>

    <pre><code class="php">Livewire::test(Component::class)->assertEmitted('post-created'); 
Livewire::test(Component::class)->assertDispatched('post-created'); 
 
Livewire::test(Component::class)->assertEmittedTo(Foo::class, 'post-created'); 
Livewire::test(Component::class)->assertDispatchedTo(Foo:class, 'post-created'); 
 
Livewire::test(Component::class)->assertNotEmitted('post-created'); 
Livewire::test(Component::class)->assertNotDispatched('post-created'); 
 
Livewire::test(Component::class)->assertEmittedUp()</code></pre>

    <h3>Query String en URL</h3>
    <p>En versiones anteriores de Livewire, era posible incluir datos en la URL de la página a través de una "query string" para usar esos datos en tu componente.</p>

    <p>Por ejemplo, supongamos que tienes un enlace como el siguiente:</p>

    <pre><code class="html"><a href="/posts?category=tech">Ver publicaciones de tecnología</a></code></pre>

    <p>En Livewire 2, podías acceder al valor "tech" desde tu componente mediante el método $this->get('category').</p>

    <p>En Livewire 3, este comportamiento ha cambiado para ser más consistente con otras tecnologías web. Ahora, debes usar el objeto de solicitud (Request) para obtener los datos de la "query string".</p>

    <p>Para obtener el valor "tech" en Livewire 3, debes hacer lo siguiente:</p>

    <pre><code class="php">// Antes de Livewire 3
public function render()
{
    $category = $this->get('category');
    // ...
}
 
// Livewire 3 en adelante
use Illuminate\Http\Request;
 
public function render(Request $request)
{
    $category = $request->query('category');
    // ...
}</code></pre>

    <h3>Recargar la página en fallo</h3>
    <p>En Livewire 2, cuando una solicitud de Livewire fallaba, la página se recargaba automáticamente. Esto sucedía porque Livewire inyectaba JavaScript en la página para volver a cargarla en caso de errores.</p>

    <p>En Livewire 3, se ha eliminado esta funcionalidad. Ahora, en caso de fallo, Livewire simplemente muestra el error y la página no se recargará automáticamente.</p>

    <p>Este cambio se hizo para evitar efectos secundarios no deseados causados por la recarga automática de la página.</p>

    <h3>@this</h3>
    <p>En Livewire 2, podías usar la directiva @this para hacer referencia al componente actual dentro de tu plantilla:</p>

    <pre><code class="html"><button wire:click="updateName">Actualizar</button></code></pre>

    <p>En Livewire 3, el uso de @this ha sido eliminado. Ahora, puedes hacer referencia al componente directamente sin necesidad de @this:</p>

    <pre><code class="html"><button wire:click="updateName">Actualizar</button></code></pre>

    <h3>wire:init</h3>
    <p>En Livewire 2, podías usar la directiva wire:init para realizar una acción después de que se inicializara el componente:</p>

    <pre><code class="html"><div wire:init="initializeComponent">
    {{ $foo }}
</div></code></pre>

    <p>En Livewire 3, la directiva wire:init ha sido eliminada y reemplazada por el método mount(), que es ejecutado automáticamente después de que se inicialice el componente:</p>

    <pre><code class="php">class MyComponent extends Component
{
    public function mount()
    {
        $this->initializeComponent();
    }
}</code></pre>

    <p>Es recomendable migrar el código de wire:init a mount() para mantener la funcionalidad esperada de tu componente.</p>

    <h3>Publicar componentes en Laravel 8</h3>
    <p>En Livewire 2, podías publicar componentes en Laravel 8 usando el comando php artisan vendor:publish --tag=livewire:assets.</p>

    <p>En Livewire 3, este comando ha sido eliminado, ya que Livewire ahora se publica automáticamente sin la necesidad de este comando.</p>

    <h3>@csrf en formularios</h3>
    <p>En Livewire 2, podías usar la directiva @csrf para agregar automáticamente un campo CSRF a los formularios de Livewire.</p>

    <pre><code class="html"><form>
    @csrf
    <!-- Resto del formulario -->
</form></code></pre>

    <p>En Livewire 3, esta funcionalidad ha sido eliminada y debes agregar manualmente el campo CSRF a tus formularios de la forma que lo harías en cualquier formulario normal de Laravel.</p>

    <pre><code class="html"><form>
    @csrf
    <!-- Resto del formulario -->
</form></code></pre>

    <h3>Estilos para formularios de Livewire</h3>
    <p>En Livewire 2, Livewire aplicaba automáticamente estilos CSS para ocultar los elementos del formulario mientras se enviaban las solicitudes de Livewire.</p>

    <p>En Livewire 3, esta funcionalidad ha sido eliminada. Si dependías de estos estilos en tu aplicación, deberás incluirlos manualmente para mantener el comportamiento deseado.</p>

    <h3>Deshabilitar el submit automático</h3>
    <p>En Livewire 2, Livewire deshabilitaba automáticamente el envío de formularios en la página mientras se enviaban solicitudes de Livewire para evitar que los usuarios hicieran clic repetidamente en los botones de envío.</p>

    <p>En Livewire 3, esta funcionalidad ha sido eliminada, por lo que ahora debes deshabilitar manualmente el envío de formularios en tus componentes para mantener el comportamiento esperado.</p>

    <pre><code class="html"><form wire:submit.prevent="submitForm">
    <!-- Resto del formulario -->
</form></code></pre>

    <h3>Wire:ignore</h3>
    <p>En Livewire 2, podías usar la directiva wire:ignore para evitar que Livewire administrara un elemento específico dentro de un componente:</p>

    <pre><code class="html"><div wire:ignore>
    <!-- Contenido ignorado por Livewire -->
</div></code></pre>

    <p>En Livewire 3, esta funcionalidad ha sido eliminada y debes evitar el uso de wire:ignore. En su lugar, es preferible ajustar el componente para trabajar con Livewire adecuadamente sin la necesidad de ignorar elementos.</p>

    <h3>@json</h3>
    <p>En Livewire 2, podías usar la directiva @json para codificar variables JavaScript:</p>

    <pre><code class="html">&lt;script&gt;
    const data = @json($data);
&lt;/script&gt;</code></pre>

    <p>En Livewire 3, el uso de @json ha sido eliminado y deberás usar la función json_encode() de PHP directamente:</p>

    <pre><code class="html">&lt;script&gt;
    const data = {!! json_encode($data) !!};
&lt;/script&gt;</code></pre>

    <h3>Livewire Assets</h3>
    <p>En versiones anteriores de Livewire, podías publicar los activos de Livewire en tu aplicación usando el siguiente comando:</p>

    <pre><code class="bash">php artisan vendor:publish --tag=livewire:assets</code></pre>

    <p>En Livewire 3, esta funcionalidad ha sido eliminada porque los activos de Livewire ahora se publican automáticamente. No es necesario ejecutar el comando mencionado anteriormente en Livewire 3.</p>

    
