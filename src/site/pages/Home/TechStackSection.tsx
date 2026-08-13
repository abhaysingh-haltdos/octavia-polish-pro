import React, { useState } from 'react';
import { Layers, Code2, Server, Cloud, Cpu, Smartphone, Database } from '@/site/icons';

interface TechItem {
  name: string;
  category: 'frontend' | 'backend' | 'cloud' | 'ai' | 'mobile' | 'db';
  iconUrl: string;
  desc: string;
}

const TECH_ITEMS: TechItem[] = [
  // Frontend
  { name: 'React', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg', desc: 'SPA & Micro-Frontends' },
  { name: 'TypeScript', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg', desc: 'Type-Safe Architecture' },
  { name: 'Next.js', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nextjs/nextjs-original.svg', desc: 'SSR & Static Generation' },
  { name: 'Vue.js', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg', desc: 'Progressive Web Apps' },
  { name: 'Angular', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/angularjs/angularjs-original.svg', desc: 'Enterprise Frontends' },
  { name: 'Tailwind CSS', category: 'frontend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg', desc: 'Design Systems' },

  // Backend
  { name: 'Node.js', category: 'backend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nodejs/nodejs-original.svg', desc: 'Asynchronous APIs' },
  { name: 'Python', category: 'backend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg', desc: 'AI & Data Services' },
  { name: 'Java', category: 'backend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/java/java-original.svg', desc: 'Enterprise Systems' },
  { name: 'Go', category: 'backend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original-wordmark.svg', desc: 'High-Scale Microservices' },
  { name: 'Laravel', category: 'backend', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg', desc: 'Full-Stack PHP' },

  // Cloud & DevOps
  { name: 'AWS', category: 'cloud', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg', desc: 'Cloud Infrastructure' },
  { name: 'Azure', category: 'cloud', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/azure/azure-original.svg', desc: 'Enterprise Cloud' },
  { name: 'Google Cloud', category: 'cloud', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/googlecloud/googlecloud-original.svg', desc: 'GCP AI & Analytics' },
  { name: 'Kubernetes', category: 'cloud', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kubernetes/kubernetes-plain.svg', desc: 'Container Orchestration' },
  { name: 'Docker', category: 'cloud', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-original.svg', desc: 'Containerization' },

  // AI & ML
  { name: 'PyTorch', category: 'ai', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/pytorch/pytorch-original.svg', desc: 'Deep Learning Models' },
  { name: 'TensorFlow', category: 'ai', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tensorflow/tensorflow-original.svg', desc: 'Production Machine Learning' },
  { name: 'OpenAI', category: 'ai', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg', desc: 'LLMs & GenAI Pipelines' },

  // Mobile
  { name: 'Flutter', category: 'mobile', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/flutter/flutter-original.svg', desc: 'Cross-Platform Native' },
  { name: 'Swift', category: 'mobile', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/swift/swift-original.svg', desc: 'iOS Native Apps' },
  { name: 'Kotlin', category: 'mobile', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kotlin/kotlin-original.svg', desc: 'Android Native Apps' },

  // Databases
  { name: 'PostgreSQL', category: 'db', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/postgresql/postgresql-original.svg', desc: 'Relational Database' },
  { name: 'MongoDB', category: 'db', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mongodb/mongodb-original.svg', desc: 'NoSQL Document Store' },
  { name: 'Redis', category: 'db', iconUrl: 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/redis/redis-original.svg', desc: 'In-Memory Cache' },
];

export const TechStackSection: React.FC = () => {
  const [activeTab, setActiveTab] = useState<'all' | 'frontend' | 'backend' | 'cloud' | 'ai' | 'mobile' | 'db'>('all');

  const categories = [
    { id: 'all', label: 'All Technologies', icon: Layers },
    { id: 'frontend', label: 'Frontend', icon: Code2 },
    { id: 'backend', label: 'Backend', icon: Server },
    { id: 'cloud', label: 'Cloud & DevOps', icon: Cloud },
    { id: 'ai', label: 'AI & Data', icon: Cpu },
    { id: 'mobile', label: 'Mobile', icon: Smartphone },
    { id: 'db', label: 'Databases', icon: Database },
  ];

  const filtered = activeTab === 'all' ? TECH_ITEMS : TECH_ITEMS.filter((t) => t.category === activeTab);

  return (
    <section className="py-24 bg-[#153758] text-white border-t border-white/10" id="tech-stack">
      <div className="max-w-7xl mx-auto px-6">
        <div className="text-center max-w-3xl mx-auto mb-12 space-y-4">
          <span className="text-xs font-bold uppercase tracking-widest text-[#D9C48F]">
            World-Class Tools
          </span>
          <h2 className="text-3xl sm:text-5xl font-black text-white tracking-tight">
            Technology Stack
          </h2>
          <p className="text-[#B4C1CD] text-base sm:text-lg">
            We engineer with the world&apos;s most trusted technologies — 150+ tools across every layer of the modern enterprise stack.
          </p>
        </div>

        {/* Tab Filters */}
        <div className="flex flex-wrap items-center justify-center gap-2 mb-12">
          {categories.map((cat) => {
            const Icon = cat.icon;
            const isActive = activeTab === cat.id;
            return (
              <button
                key={cat.id}
                onClick={() => setActiveTab(cat.id as any)}
                className={`flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold transition-all ${
                  isActive
                    ? 'bg-[#264868] text-white border border-[#C1A972]/40 shadow-lg shadow-black/20'
                    : 'bg-white/5 text-[#B4C1CD] hover:bg-white/10 hover:text-white border border-white/10'
                }`}
              >
                <Icon className={`w-3.5 h-3.5 ${isActive ? 'text-[#D9C48F]' : 'text-[#B4C1CD]'}`} />
                <span>{cat.label}</span>
              </button>
            );
          })}
        </div>

        {/* Tech Items Grid */}
        <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
          {filtered.map((item, idx) => (
            <div
              key={idx}
              className="p-5 rounded-2xl bg-white/5 border border-white/10 hover:border-[#C1A972] hover:bg-white/10 transition-all duration-300 text-center group flex flex-col items-center justify-center"
            >
              <img
                src={item.iconUrl}
                alt={item.name}
                className="w-10 h-10 mb-3 object-contain filter group-hover:scale-110 transition-transform duration-300"
                onError={(e) => {
                  (e.target as HTMLElement).style.display = 'none';
                }}
              />
              <h4 className="font-bold text-sm text-white group-hover:text-[#D9C48F] transition-colors">
                {item.name}
              </h4>
              <span className="text-[11px] text-[#B4C1CD] mt-0.5">{item.desc}</span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};
