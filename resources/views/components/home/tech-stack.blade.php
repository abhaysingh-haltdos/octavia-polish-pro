@php
$techItems = [
  ['name' => 'React', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg', 'desc' => 'SPA & Micro-Frontends'],
  ['name' => 'TypeScript', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg', 'desc' => 'Type-Safe Architecture'],
  ['name' => 'Next.js', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nextjs/nextjs-original.svg', 'desc' => 'SSR & Static Generation'],
  ['name' => 'Vue.js', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg', 'desc' => 'Progressive Web Apps'],
  ['name' => 'Angular', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/angularjs/angularjs-original.svg', 'desc' => 'Enterprise Frontends'],
  ['name' => 'Tailwind CSS', 'category' => 'frontend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg', 'desc' => 'Design Systems'],
  
  ['name' => 'Node.js', 'category' => 'backend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nodejs/nodejs-original.svg', 'desc' => 'Asynchronous APIs'],
  ['name' => 'Python', 'category' => 'backend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg', 'desc' => 'AI & Data Services'],
  ['name' => 'Java', 'category' => 'backend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/java/java-original.svg', 'desc' => 'Enterprise Systems'],
  ['name' => 'Go', 'category' => 'backend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original-wordmark.svg', 'desc' => 'High-Scale Microservices'],
  ['name' => 'Laravel', 'category' => 'backend', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg', 'desc' => 'Full-Stack PHP'],
  
  ['name' => 'AWS', 'category' => 'cloud', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg', 'desc' => 'Cloud Infrastructure'],
  ['name' => 'Azure', 'category' => 'cloud', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/azure/azure-original.svg', 'desc' => 'Enterprise Cloud'],
  ['name' => 'Google Cloud', 'category' => 'cloud', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/googlecloud/googlecloud-original.svg', 'desc' => 'GCP AI & Analytics'],
  ['name' => 'Kubernetes', 'category' => 'cloud', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kubernetes/kubernetes-plain.svg', 'desc' => 'Container Orchestration'],
  ['name' => 'Docker', 'category' => 'cloud', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-original.svg', 'desc' => 'Containerization'],
  
  ['name' => 'PyTorch', 'category' => 'ai', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/pytorch/pytorch-original.svg', 'desc' => 'Deep Learning Models'],
  ['name' => 'TensorFlow', 'category' => 'ai', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tensorflow/tensorflow-original.svg', 'desc' => 'Production Machine Learning'],
  ['name' => 'OpenAI', 'category' => 'ai', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg', 'desc' => 'LLMs & GenAI Pipelines'],
  
  ['name' => 'Flutter', 'category' => 'mobile', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/flutter/flutter-original.svg', 'desc' => 'Cross-Platform Native'],
  ['name' => 'Swift', 'category' => 'mobile', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/swift/swift-original.svg', 'desc' => 'iOS Native Apps'],
  ['name' => 'Kotlin', 'category' => 'mobile', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kotlin/kotlin-original.svg', 'desc' => 'Android Native Apps'],
  
  ['name' => 'PostgreSQL', 'category' => 'db', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/postgresql/postgresql-original.svg', 'desc' => 'Relational Database'],
  ['name' => 'MongoDB', 'category' => 'db', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mongodb/mongodb-original.svg', 'desc' => 'NoSQL Document Store'],
  ['name' => 'Redis', 'category' => 'db', 'iconUrl' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/redis/redis-original.svg', 'desc' => 'In-Memory Cache'],
];

$categories = [
    ['id' => 'all', 'label' => 'All Technologies', 'icon' => '<path d="M4 6h16M4 12h16M4 18h7"/>'],
    ['id' => 'frontend', 'label' => 'Frontend', 'icon' => '<path d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>'],
    ['id' => 'backend', 'label' => 'Backend', 'icon' => '<path d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>'],
    ['id' => 'cloud', 'label' => 'Cloud & DevOps', 'icon' => '<path d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>'],
    ['id' => 'ai', 'label' => 'AI & Data', 'icon' => '<path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>'],
    ['id' => 'mobile', 'label' => 'Mobile', 'icon' => '<path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>'],
    ['id' => 'db', 'label' => 'Databases', 'icon' => '<path d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>'],
];
@endphp

<section class="py-24 bg-[#153758] text-white border-t border-white/10" id="tech-stack" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
                World-Class Tools
            </span>
            <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                Technology Stack
            </h2>
            <p class="text-[#B4C1CD] text-base sm:text-lg">
                We engineer with the world's most trusted technologies — 150+ tools across every layer of the modern enterprise stack.
            </p>
        </div>

        <!-- Tab Filters -->
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            @foreach ($categories as $cat)
                <button
                    @click="activeTab = '{{ $cat['id'] }}'"
                    :class="activeTab === '{{ $cat['id'] }}' ? 'bg-[#264868] text-white border-[#C1A972]/40 shadow-lg shadow-black/20' : 'bg-white/5 text-[#B4C1CD] hover:bg-white/10 hover:text-white border-white/10'"
                    class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold transition-all border"
                >
                    <svg class="w-5 h-5 transition-colors" :class="activeTab === '{{ $cat['id'] }}' ? 'text-[#D9C48F]' : 'text-[#B4C1CD]'" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">{!! $cat['icon'] !!}</svg>
                    <span>{{ $cat['label'] }}</span>
                </button>
            @endforeach
        </div>

        <!-- Tech Items Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($techItems as $item)
                <div
                    x-show="activeTab === 'all' || activeTab === '{{ $item['category'] }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="p-5 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-white/10 transition-all duration-300 text-center group flex flex-col items-center justify-center"
                >
                    <img
                        src="{{ $item['iconUrl'] }}"
                        alt="{{ $item['name'] }}"
                        class="w-12 h-12 mb-3 object-contain filter group-hover:scale-110 transition-transform duration-300"
                        onerror="this.style.display='none'"
                    />
                    <h4 class="font-bold text-sm text-white group-hover:text-[#D9C48F] transition-colors">
                        {{ $item['name'] }}
                    </h4>
                    <span class="text-[11px] text-[#B4C1CD] mt-0.5">{{ $item['desc'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
