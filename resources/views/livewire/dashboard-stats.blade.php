          <div class="grid auto-rows-min gap-4 md:grid-cols-3">
              <div
                  class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 flex flex-col items-center justify-center">
                  <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Students</h2>
                  <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $studentsCount }}</p>
              </div>

              <div
                  class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 flex flex-col items-center justify-center">
                  <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Teachers</h2>
                  <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $teachersCount }}</p>
              </div>

              <div
                  class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 flex flex-col items-center justify-center">
                  <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Classes</h2>
                  <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $classesCount }}</p>
              </div>


          </div>
