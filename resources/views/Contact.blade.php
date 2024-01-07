<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-forms.tw_card> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, maxime ex!
                        Soluta velit, quia perferendis iure dicta veniam omnis sit laborum alias harum minima temporibus
                        aperiam quaerat voluptate dolores modi, nulla aut labore ab quasi laudantium voluptatem earum
                        porro. Laborum eum reprehenderit amet unde alias deserunt sapiente eaque excepturi repellendus
                        qui quam, maiores, atque, quisquam facilis perspiciatis veniam quo magni ducimus. Fugiat vitae
                        perspiciatis cupiditate sapiente iste consectetur nemo quo, rerum sunt culpa sequi maiores
                        delectus fugit perferendis voluptas, voluptates quia saepe quisquam eligendi! Earum deleniti
                        error corporis maxime quisquam, blanditiis exercitationem quo minima, iure accusamus porro
                        similique aspernatur quidem quis ipsa nostrum perferendis, perspiciatis eius voluptas? A ipsa
                        aliquid, eos recusandae minus dicta dolorem inventore qui tenetur natus libero. Non maiores
                        nostrum officiis a error, vel atque officia animi accusamus facilis molestias similique ad quos
                        eaque in veritatis aspernatur dolorum doloribus earum voluptatum adipisci eveniet eius beatae!
                        Esse, reiciendis sunt consequuntur ducimus nobis obcaecati debitis sequi aspernatur dicta,
                        tempore sint ea rem amet neque culpa cum nulla commodi, ipsum ipsa quasi laudantium maxime. Fuga
                        consectetur, aliquam, nesciunt minus, ipsam deserunt quisquam voluptate quis eius natus
                        recusandae eos! Commodi eius repudiandae ipsum, qui consectetur eligendi sint dolore optio
                        facilis modi.

                        <x-slot
                            name="encabezado">{{ isset($name) ? __('Formulario de Contacto ' . $name) : __('Formulario de Contacto ') }}</x-slot>
                        {{-- <x-slot name="piePagina"></x-slot>
                        <x-slot name="botonAccion1">
                            <button type="button"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-600">{{ __('Save') }}</button>
                        </x-slot> --}}
                    </x-forms.tw_card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
